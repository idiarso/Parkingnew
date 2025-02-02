<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingSessionController;

// API Routes
Route::middleware('gate.auth')->group(function () {
    // Parking Sessions
    Route::post('/parking/entry', [ParkingSessionController::class, 'entry']);
    Route::post('/parking/exit', [ParkingSessionController::class, 'exit']);
    Route::get('/parking/active', [ParkingSessionController::class, 'active']);
    
    // Fallback for all other requests
    Route::any('/{any}', function (Request $request) {
        return response()->json([
            'status' => 'success',
            'message' => 'Request processed successfully',
            'gate_info' => [
                'id' => $request->gate_id,
                'name' => $request->gate_name
            ],
            'data' => $request->all()
        ], 200);
    })->where('any', '.*');
});