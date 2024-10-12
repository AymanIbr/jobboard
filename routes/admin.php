<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\JobController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('HomePage');
    Route::resource('categories',CategoryController::class);
    Route::resource('jobs',JobController::class);
});
