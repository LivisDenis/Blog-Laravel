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

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
    Route::post('login_form', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_form');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');

        Route::get('create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');

        Route::delete('{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('destroy');
    });
});
