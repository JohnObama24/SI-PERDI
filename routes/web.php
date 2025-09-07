<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\authController;
use App\Http\Controllers\perjalananController;
use App\Exports\PerjalananExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [authController::class, 'ShowLoginForm'])->name('login');
Route::post('/login', [authController::class, 'login'])->name('login.process');


Route::post('/logout', [authController::class, 'Logout'])->name('logout.process');

Route::middleware(['auth:pegawai', 'role:admin'])->group(function () {
    Route::get('/register', [authController::class, 'ShowRegisForm'])->name('register');
    Route::post('/register', [authController::class, 'Register'])->name('register.process');
    Route::get('/admin', [perjalananController::class, 'index'])->name('admin-dashboard');
    Route::patch('/verifikasi/accept/{id}', [perjalananController::class, 'verifikasiAccept'])->name('verifikasi-accept');
    Route::patch('/verifikasi/reject/{id}', [perjalananController::class, 'verifikasiReject'])->name('verifikasi-reject');
    Route::get('/export-form', [perjalananController::class, 'ShowExportForm'])->name('export');
    Route::post('/export-form/excel', [perjalananController::class, 'export'])->name('export.excel');
});

Route::middleware(['auth:pegawai', 'role:pegawai'])->group(function () {
    Route::get('/pegawai', [perjalananController::class, 'index'])->name('pegawai-dashboard');
    Route::get('/buat-perjalanan', fn() => view('pegawai.formPerjalanan'))->name('pegawai-form');
    Route::post('/buat-perjalanan', [perjalananController::class, 'store'])->name('pegawai-buat');
    Route::patch('/buat-perjalanan/{id}/status', [perjalananController::class, 'updateStatus'])->name('pegawai-status');
    Route::get('/edit-perjalanan/{id}', [perjalananController::class, 'edit'])->name('pegawaiEdit-form');
    Route::put('/edit-perjalanan/{id}', [perjalananController::class, 'update'])->name('pegawaiUpdate--form');
});
