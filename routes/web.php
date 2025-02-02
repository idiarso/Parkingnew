<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
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
    Route::prefix('parking')->group(function () {
        Route::get('/', [ParkingController::class, 'index'])->name('parking.index');
        Route::get('/entry', [ParkingController::class, 'entry'])->name('parking.entry');
        Route::post('/store', [ParkingController::class, 'store'])->name('parking.store');
        Route::get('/history', [ParkingController::class, 'history'])->name('parking.history');
        Route::post('/{id}/checkout', [ParkingController::class, 'checkout'])->name('parking.checkout');
    });

    // Report Routes
    Route::prefix('reports')->group(function () {
        Route::get('/daily', [ReportController::class, 'daily'])->name('reports.daily');
        Route::get('/monthly', [ReportController::class, 'monthly'])->name('reports.monthly');
        Route::get('/yearly', [ReportController::class, 'yearly'])->name('reports.yearly');
        Route::get('/export/daily', [ReportController::class, 'exportDaily'])->name('reports.export.daily');
        Route::get('/export/monthly', [ReportController::class, 'exportMonthly'])->name('reports.export.monthly');
        Route::get('/export/yearly', [ReportController::class, 'exportYearly'])->name('reports.export.yearly');
    });

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Only Routes
    Route::middleware(['admin'])->group(function () {
        // Users Management
        Route::resource('users', UserController::class);
        
        // Vehicle Types Management
        Route::resource('vehicles', VehicleController::class);
        
        // Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});

// Include Authentication Routes
require __DIR__.'/auth.php';