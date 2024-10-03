<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Front\HomeController;
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

Route::get('/',[HomeController::class , 'index'])->name('indexPage');
Route::get('/profile',[HomeController::class , 'profile'])->name('profilePage');

Route::get('/login',[HomeController::class , 'login'])->name('loginPage');
Route::get('/register',[HomeController::class , 'register'])->name('registerPage');

Route::get('/post-job',[HomeController::class , 'postJob'])->name('postJobPage');

Route::get('/contact',[HomeController::class , 'contact'])->name('contactPage');
Route::get('/about',[HomeController::class , 'about'])->name('aboutPage');

Route::get('/job-singel',[HomeController::class , 'jobSingel'])->name('jobSinglePage');


// Route::get('/', function () {
//     return view('welcome');
// });
