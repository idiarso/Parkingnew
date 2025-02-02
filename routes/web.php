<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\ParkingController;
use Illuminate\Support\Facades\Route;

// Redirect root to dashboard or login
Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('auth');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Overview
    Route::get('/overview', [OverviewController::class, 'index'])->name('overview');
    
    // Parking Routes
    Route::get('/parking', [ParkingController::class, 'index'])->name('parking.index');
    Route::get('/parking/entry', [ParkingController::class, 'entry'])->name('parking.entry');
    Route::get('/parking/exit', [ParkingController::class, 'exit'])->name('parking.exit');
});

// Include Authentication Routes
require __DIR__.'/auth.php';