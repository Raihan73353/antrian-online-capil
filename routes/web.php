<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;

// Default route -> langsung arahkan ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route dashboard
Route::get('/dashboardAdmin', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('warga', WargaController::class);
Route::get('/cetak-antrian', [WargaController::class, 'cetak'])->name('cetak.antrian');
Route::get('/register', [WargaController::class, 'register'])->name('register');
