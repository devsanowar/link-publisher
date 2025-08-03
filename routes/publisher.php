<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Publisher\DashboardController;
use App\Http\Controllers\Auth\Publisher\LoginController;
use App\Http\Controllers\Auth\Publisher\RegisterController;
use App\Http\Controllers\Publisher\ProfileSettingController;


Route::prefix('publisher')->group(function () {
    Route::get('register-form', [RegisterController::class, 'index'])->name('register.index');
    Route::post('register-form/store', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login-form', [LoginController::class, 'index'])->name('loginForm');
    Route::post('login', [LoginController::class, 'login'])->name('publisher.login');

    // ✅ Protect profile and dashboard with ispublisher
    Route::middleware('publisher')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('publisher.dashboard');
        Route::get('profile', [ProfileSettingController::class, 'index'])->name('publisher.profile');
        Route::post('/profile/update', [ProfileSettingController::class, 'update'])->name('profile.update');
        Route::post('/update-image', [ProfileSettingController::class, 'updateImage'])->name('publisher.update-image');
    });
});
