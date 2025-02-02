<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParkingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Protected routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Overview
    Route::get('/overview', [AdminController::class, 'overview'])->name('overview');
    
    // Parking Management
    Route::prefix('parking')->name('parking.')->group(function () {
        Route::get('/', [ParkingController::class, 'index'])->name('index');
        Route::get('/entry', [ParkingController::class, 'entry'])->name('entry');
        Route::post('/entry', [ParkingController::class, 'store'])->name('store');
        Route::get('/exit/{id}', [ParkingController::class, 'exit'])->name('exit');
        Route::post('/exit/{id}', [ParkingController::class, 'processExit'])->name('process-exit');
        Route::get('/history', [ParkingController::class, 'history'])->name('history');
    });

    // Reports
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/daily', [AdminController::class, 'dailyReport'])->name('daily');
        Route::get('/monthly', [AdminController::class, 'monthlyReport'])->name('monthly');
        Route::get('/yearly', [AdminController::class, 'yearlyReport'])->name('yearly');
        Route::get('/export', [AdminController::class, 'exportReport'])->name('export');
    });

    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [AdminController::class, 'settings'])->name('index');
        Route::post('/update', [AdminController::class, 'updateSettings'])->name('update');
    });

    // Profile Management
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // User Management (Admin only)
    Route::middleware(['admin'])->prefix('users')->name('users.')->group(function () {
        Route::get('/', [AdminController::class, 'users'])->name('index');
        Route::get('/create', [AdminController::class, 'createUser'])->name('create');
        Route::post('/store', [AdminController::class, 'storeUser'])->name('store');
        Route::get('/{user}/edit', [AdminController::class, 'editUser'])->name('edit');
        Route::patch('/{user}', [AdminController::class, 'updateUser'])->name('update');
        Route::delete('/{user}', [AdminController::class, 'destroyUser'])->name('destroy');
    });
});

// Authentication routes
require __DIR__.'/auth.php';