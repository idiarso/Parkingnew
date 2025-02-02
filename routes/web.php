<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('parking')->group(function () {
    Route::get('/sessions', [ParkingSessionController::class, 'index'])->name('parking.sessions.index');
    Route::post('/entry', [ParkingSessionController::class, 'processVehicleEntry'])->name('parking.entry');
    Route::post('/exit', [ParkingSessionController::class, 'processVehicleExit'])->name('parking.exit');
    Route::get('/sessions/{parkingSession}', [ParkingSessionController::class, 'show'])->name('parking.sessions.show');
    Route::post('/manual-entry', [ParkingSessionController::class, 'manualEntry'])->name('parking.manual.entry');
    Route::post('/manual-exit', [ParkingSessionController::class, 'manualExit'])->name('parking.manual.exit');
});
require __DIR__.'/auth.php';
