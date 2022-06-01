<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'login');

Route::prefix('company')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('company.index');
});

