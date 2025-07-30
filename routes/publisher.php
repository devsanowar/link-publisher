<?php

use App\Http\Controllers\Auth\Publisher\LoginController;
use App\Http\Controllers\Auth\Publisher\RegisterController;
use App\Http\Controllers\Publisher\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('publisher')->group(function () {
    Route::get('register-form', [RegisterController::class, 'index'])->name('register.index');
    Route::post('register-form/store', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login-form', [LoginController::class, 'index'])->name('loginForm');
    Route::post('login', [LoginController::class, 'login'])->name('publisher.login');


    route::get('dashboard', [DashboardController::class, 'dashboard'])->name('publisher.dashboard');
});