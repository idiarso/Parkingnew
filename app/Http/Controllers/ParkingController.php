<?php

namespace App\Http\Controllers;

use App\Models\ParkingTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function entry()
    {
        return view('parking.entry');
    }

    public function index()
    {
        $parkings = ParkingTransaction::whereNull('waktu_keluar')
            ->orderBy('waktu_masuk', 'desc')
            ->get();
            
        return view('parking.index', compact('parkings'));
    }

    public function history()
    {
        $parkings = ParkingTransaction::whereNotNull('waktu_keluar')
            ->orderBy('waktu_keluar', 'desc')
            ->paginate(10);
            
        return view('parking.history', compact('parkings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required|string',
            'jenis_kendaraan' => 'required|in:motor,mobil',
        ]);

        ParkingTransaction::create([
            'plat_nomor' => strtoupper($request->plat_nomor),
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'waktu_masuk' => Carbon::now(),
        ]);

        return redirect()->route('parking.index')
            ->with('success', 'Kendaraan berhasil dicatat masuk.');
    }

    public function checkout($id)
    {
        $parking = ParkingTransaction::findOrFail($id);
        
        if ($parking->waktu_keluar) {
            return redirect()->back()
                ->with('error', 'Kendaraan sudah keluar.');
        }

        $parking->waktu_keluar = Carbon::now();
        $parking->durasi = $parking->waktu_keluar->diffInHours($parking->waktu_masuk);
        $parking->biaya = $this->calculateFee($parking->jenis_kendaraan, $parking->durasi);
        $parking->save();

        return redirect()->route('parking.index')
            ->with('success', 'Kendaraan berhasil dicatat keluar.');
    }

    private function calculateFee($vehicleType, $hours)
    {
        // Biaya dasar
        $baseFee = $vehicleType === 'motor' ? 2000 : 5000;
        
        // Biaya per jam setelah jam pertama
        $hourlyFee = $vehicleType === 'motor' ? 1000 : 2000;
        
        // Jika kurang dari 1 jam, tetap dihitung 1 jam
        if ($hours < 1) {
            return $baseFee;
        }
        
        // Perhitungan biaya total
        return $baseFee + ($hourlyFee * ($hours - 1));
    }
}