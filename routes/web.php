<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)
    ->group(function () {
        Route::get('/', 'login')->name('login');
        Route::post('/logout', 'destroy')->name('logout');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');