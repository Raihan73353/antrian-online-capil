<?php

use App\Http\Controllers\DukcapilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PencatatanSipilController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


// Default route -> langsung arahkan ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route warga
Route::resource('warga', WargaController::class);
Route::get('/cetak-antrian', [WargaController::class, 'cetak'])->name('cetak.antrian');
Route::get('/register', [WargaController::class, 'register'])->name('register');

//route admin
Route::get('/dashboardAdmin', [DashboardController::class, 'index'])->name('dashboard')->middleware(\App\Http\Middleware\CheckLogin::class);;
Route::resource('jadwal', JadwalController::class)->middleware(\App\Http\Middleware\CheckLogin::class);;

// Route::resource('/dukcapil', DukcapilController::class);
Route::get('/dukcapil', [DukcapilController::class, 'index'])->name('dukcapil.index')->middleware(\App\Http\Middleware\CheckLogin::class);;
Route::post('/dukcapil/{id}/konfirmasi', [DukcapilController::class, 'konfirmasi'])->name('dukcapil.konfirmasi');
Route::get('/dukcapil/{id}/show', [DukcapilController::class, 'show'])->name('dukcapil.show');
Route::get('/dukcapil/{id}/call', [DukcapilController::class, 'call'])->name('dukcapil.call');


// Route::resource('/pencatatan_sipil', PencatatanSipilController::class);
Route::get('/pencatatan_sipil', [PencatatanSipilController::class, 'index'])->name('pencatatan_sipil.index')->middleware(\App\Http\Middleware\CheckLogin::class);;
Route::post('/pencatatan_sipil/{id}/konfirmasi', [PencatatanSipilController::class, 'konfirmasi'])->name('pencatatan_sipil.konfirmasi');
Route::get('/pencatatan_sipil/{id}/show', [PencatatanSipilController::class, 'show'])->name('pencatatan_sipil.show');
Route::get('/pencatatan_sipil/{id}/call', [PencatatanSipilController::class, 'call'])->name('pencatatan_sipil.call');



Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index')->middleware(\App\Http\Middleware\CheckLogin::class);;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ->middleware(\App\Http\Middleware\CheckLogin::class);
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store']);

// Ubah password (hanya untuk admin login)
Route::get('/user/password', [UserController::class, 'editPassword'])->name('user.password.edit');
Route::post('/user/password', [UserController::class, 'updatePassword'])->name('user.password.update');
