<?php

use App\Http\Controllers\Auth\Publisher\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('publisher')->group(function () {
    Route::get('register-form', [RegisterController::class, 'index'])->name('register.index');
    Route::post('register-form/store', [RegisterController::class, 'store'])->name('register.store');
});