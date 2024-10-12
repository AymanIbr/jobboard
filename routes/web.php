<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/',[HomeController::class , 'index'])->name('indexPage');
Route::get('/profile',[HomeController::class , 'profile'])->name('profilePage');

Route::get('/login',[HomeController::class , 'login'])->name('web.login');
Route::get('/register',[HomeController::class , 'register'])->name('web.register');

Route::get('/post-job',[HomeController::class , 'postJob'])->name('postJobPage');

Route::get('/contact',[HomeController::class , 'contact'])->name('contactPage');
Route::get('/about',[HomeController::class , 'about'])->name('aboutPage');

Route::get('/job-singel/{slug}',[HomeController::class , 'jobSingel'])->name('jobSinglePage');



require __DIR__.'/auth.php';
