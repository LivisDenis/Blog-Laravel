<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('home');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'showContactForm'])->name('contacts');
Route::post('/contact_form', [\App\Http\Controllers\ContactController::class, 'contactFrom'])->name('contact_form');

Route::get('/forgot', [\App\Http\Controllers\AuthController::class, 'showForgotForm'])->name('forgot');
Route::post('/forgot_form', [\App\Http\Controllers\AuthController::class, 'forgot'])->name('forgot_form');

Route::prefix('posts')->group(function () {
    Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');

    Route::get('/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
});

Route::middleware('auth:web')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::post('/posts/comment/{id}', [\App\Http\Controllers\PostController::class, 'comment'])->name('comment');
});

Route::middleware('guest:web')->group(function () {

    Route::prefix('register')->group(function () {
        Route::get('/', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
        Route::post('/', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');
    });

    Route::prefix('login')->group(function () {
        Route::get('/', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');
    });
});
