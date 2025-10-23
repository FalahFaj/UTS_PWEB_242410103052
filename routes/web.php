<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengelolaanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'tampilkanHome'])->name('home');

Route::get('/login', [AuthController::class, 'tampilkanLogin'])->name('login.form');

Route::get('/login-process', [AuthController::class, 'Login'])->name('login.proses');

Route::get('/dashboard/{username}', [DashboardController::class, 'tampilkanDashboard'])->name('dashboard');

Route::resource('pengelolaan', PengelolaanController::class);

Route::get('/profile', [ProfileController::class, 'tampilkanProfile'])->name('profile');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
