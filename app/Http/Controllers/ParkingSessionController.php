<?php

namespace App\Http\Controllers;

use App\Models\ParkingSession;
use App\Services\AnprService;
use Illuminate\Http\Request;

class ParkingSessionController extends Controller
{
    protected $anprService;

    public function __construct(AnprService $anprService)
    {
        $this->anprService = $anprService;
    }

    public function entry(Request $request)
    {
        $request->validate([
            'entry_photo' => 'required|image',
            'vehicle_id' => 'required|exists:vehicles,id',
            'entry_gate_id' => 'required|exists:gates,id',
        ]);

        $imageData = file_get_contents($request->file('entry_photo')->path());
        $plateResult = $this->anprService->recognizePlate($imageData);

        $parkingSession = new ParkingSession();
        $parkingSession->vehicle_id = $request->vehicle_id;
        $parkingSession->entry_gate_id = $request->entry_gate_id;
        $parkingSession->ticket_number = 'TKT-' . time();
        $parkingSession->plate_number = $plateResult['success'] ? $plateResult['plate_number'] : 'UNRECOGNIZED';
        $parkingSession->entry_time = now();
        $parkingSession->status = 'ACTIVE';

        if ($request->hasFile('entry_photo')) {
            $path = $request->file('entry_photo')->store('entry_photos', 'public');
            $parkingSession->entry_photo = $path;
        }

        $parkingSession->save();

        return response()->json([
            'success' => true,
            'data' => $parkingSession,
            'plate_recognition' => $plateResult
        ]);
    }
}