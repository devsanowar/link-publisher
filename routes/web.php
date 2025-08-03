<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\Frontend\VisitorLogController;
use App\Http\Controllers\Frontend\ContactPageController;
use App\Http\Controllers\Frontend\CheckoutpageController;
use App\Http\Controllers\Frontend\SocialworkPageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



Route::get('/', [FrontendController::class, 'index'])->name('home');




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
