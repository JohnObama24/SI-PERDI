<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\authController;
use App\Http\Controllers\perjalananController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [authController::class, 'ShowLoginForm'])->name('login');
Route::post('/login', [authController::class, 'login'])->name('login.process');

Route::get('/register', [authController::class, 'ShowRegisForm'])->name('register');
Route::post('/register', [authController::class, 'Register'])->name('register.process');

Route::post('/logout', [authController::class, 'Logout'])->name('logout.process');

Route::middleware(['auth:pegawai', 'role:admin'])->group(function () {
    Route::get('/admin', fn() => view('admin.testAdmin'))->name('admin-dashboard');
});

Route::middleware(['auth:pegawai', 'role:pegawai'])->group(function () {
    // Route::get('/pegawai', fn() => view('pegawai.dashboardPegawai'))->name('pegawai-dashboard');
    Route::get('/pegawai', [perjalananController::class, 'index'])->name('pegawai-dashboard');
    Route::get('/buat-perjalanan', fn() => view('pegawai.formPerjalanan'))->name('pegawai-form');
    Route::post('/buat-perjalanan', [perjalananController::class, 'store'])->name('pegawai-buat');
    Route::patch('/buat-perjalanan/{id}/status', [perjalananController::class, 'updateStatus'])->name('pegawai-status');
});
// Route::get('/pegawai', fn() => view('pegawai.beneran'))->name('pegawai');
