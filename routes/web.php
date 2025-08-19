<?php

use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Frontend\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewslatterController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('newslatter/store', [NewslatterController::class, 'store'])->name('newslatter.store');

Route::get('About-page', [AboutPageController::class, 'index'])->name('about_page');

Route::get('blog-page', [BlogController::class, 'index'])->name('blog_page');
Route::get('blog-details/{id}', [BlogController::class, 'details'])->name('blog_page.details');
Route::get('/category/{id}', [BlogController::class, 'categoryPosts'])->name('category.posts');




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
