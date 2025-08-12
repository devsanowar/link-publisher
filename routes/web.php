<?php

use App\Http\Controllers\Frontend\AboutPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewslatterController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('newslatter/store', [NewslatterController::class, 'store'])->name('newslatter.store');

Route::get('About-page', [AboutPageController::class, 'index'])->name('about_page');



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login'); // লগইন পেজ বা যেখানেই পাঠাতে চান
})->name('logout');


require __DIR__.'/auth.php';
