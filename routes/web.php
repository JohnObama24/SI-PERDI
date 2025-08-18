<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\authController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [authController::class, 'ShowLoginForm'])->name('login');
Route::post('/login', [authController::class, 'login'])->name('login.process');

Route::get('/register', [authController::class, 'ShowRegisForm'])->name('register');
Route::post('/register', [authController::class, 'Register'])->name('register.process');

Route::middleware(['auth:pegawai', 'role:admin'])->group(function () {
    Route::get('/admin', fn() => view('admin.testAdmin'))->name('admin-dashboard');
});

Route::middleware(['auth:pegawai', 'role:pegawai'])->group(function () {
    Route::get('/pegawai', fn() => view('pegawai.testPegawai'))->name('pegawai-dashboard');
});
