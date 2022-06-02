<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;

Route::redirect('/', '/login')->name('home');

Route::middleware('guest')->group(function() {
    Route::view('/login', 'login')->name('login.get');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function() {
    Route::prefix('company')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('company.index');
        Route::post('/store', [CompanyController::class, 'store'])->name('company.store');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
