<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;




Route::get('/admin', [DashboardController::class, 'index'])->name('HomePage');
