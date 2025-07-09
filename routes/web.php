<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)
    ->group(function () {
        Route::get('/', 'login')->name('login');
        Route::post('/logout', 'destroy')->name('logout');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::controller(UserController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/pengaturan/profile', 'profileSetting')->name('setting.profile');
        Route::get('/pengaturan/password', 'passwordSetting')->name('setting.password');
        Route::get('/pengguna', 'index')->middleware('role:admin')->name('users.index');
        Route::get('/pengguna/tambah', 'create')->middleware('role:admin')->name('users.create');
        Route::get('/pengguna/{username}/edit', 'edit')->middleware('role:admin')->name('users.edit');
    });

Route::controller(BookController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/buku', 'index')->name('books.index');
        Route::get('/buku/tambah', 'create')->name('books.create');
        Route::get('/buku/{id}/edit', 'edit')->name('books.edit');
    });