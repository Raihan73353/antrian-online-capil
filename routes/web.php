<?php

use App\Http\Controllers\DukcapilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PencatatanSipilController;
use App\Http\Controllers\LaporanController;

// Default route -> langsung arahkan ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route dashboard
Route::get('/dashboardAdmin', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('warga', WargaController::class);
Route::get('/cetak-antrian', [WargaController::class, 'cetak'])->name('cetak.antrian');
Route::get('/register', [WargaController::class, 'register'])->name('register');
Route::resource('jadwal', JadwalController::class);

// Route::resource('/dukcapil', DukcapilController::class);
Route::get('/dukcapil', [DukcapilController::class, 'index'])->name('dukcapil.index');
Route::post('/dukcapil/{id}/konfirmasi', [DukcapilController::class, 'konfirmasi'])->name('dukcapil.konfirmasi');
Route::get('/dukcapil/{id}/show', [DukcapilController::class, 'show'])->name('dukcapil.show');
Route::get('/dukcapil/{id}/call', [DukcapilController::class, 'call'])->name('dukcapil.call');


Route::resource('/pencatatan_sipil', PencatatanSipilController::class);
Route::get('/pencatatan_sipil', [PencatatanSipilController::class, 'index'])->name('pencatatan_sipil.index');
Route::post('/pencatatan_sipil/{id}/konfirmasi', [PencatatanSipilController::class, 'konfirmasi'])->name('pencatatan_sipil.konfirmasi');
Route::get('/pencatatan_sipil/{id}/show', [PencatatanSipilController::class, 'show'])->name('pencatatan_sipil.show');
Route::get('/pencatatan_sipil/{id}/call', [PencatatanSipilController::class, 'call'])->name('pencatatan_sipil.call');



Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
