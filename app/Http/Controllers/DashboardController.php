<?php

namespace App\Http\Controllers;

use App\Models\ParkingSession;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $today = Carbon::today();
        
        // Get today's statistics
        $statistics = ParkingSession::select([
            DB::raw('COUNT(*) as total_vehicles'),
            DB::raw('SUM(CASE WHEN exit_time IS NULL THEN 1 ELSE 0 END) as vehicles_in'),
            DB::raw('SUM(CASE WHEN exit_time IS NOT NULL THEN 1 ELSE 0 END) as vehicles_out'),
            DB::raw('SUM(CASE WHEN parking_fee IS NOT NULL THEN parking_fee ELSE 0 END) as total_income')
        ])
        ->whereDate('entry_time', $today)
        ->first();

        return view('dashboard', [
            'totalVehicles' => $statistics->total_vehicles ?? 0,
            'vehiclesIn' => $statistics->vehicles_in ?? 0,
            'vehiclesOut' => $statistics->vehicles_out ?? 0,
            'todayIncome' => $statistics->total_income ?? 0
        ]);
    }
}