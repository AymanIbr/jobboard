<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\SingleController;
use App\Http\Controllers\Front\UserController;
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




Route::middleware('auth:web')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('indexPage');

    // Route::get('/login', [HomeController::class, 'login'])->name('web.login');
    // Route::get('/register', [HomeController::class, 'register'])->name('web.register');
    Route::get('/post-job', [HomeController::class, 'postJob'])->name('postJobPage');

    Route::get('/contact', [HomeController::class, 'contact'])->name('contactPage');
    Route::get('/about', [HomeController::class, 'about'])->name('aboutPage');

    Route::get('/job-singel/{slug}', [SingleController::class, 'jobSingel'])->name('jobSinglePage');

    Route::post('/jobs/save', [SingleController::class, 'saveJob'])->name('save.job');
    Route::post('/jobs/apply', [SingleController::class, 'jobApply'])->name('apply.job');

    Route::get('/categories/single/{name}', [SingleController::class, 'singleCategory'])->name('categories.single');

    Route::get('user/profile', [UserController::class, 'profile'])->name('profile');

    Route::get('user/applications', [UserController::class, 'applications'])->name('applications');
    Route::get('user/savedjobs', [UserController::class, 'savedJobs'])->name('saved.jobs');

    // update user profile
    Route::get('user/edit-details', [UserController::class, 'editDetails'])->name('edit.details');
    Route::patch('user/edit-details', [UserController::class, 'updateDetails'])->name('update.details');

    // update user cv

    Route::get('user/edit-cv',[UserController::class , 'editCV'])->name('edit.cv');
    Route::patch('user/edit-cv', [UserController::class, 'updateCV'])->name('update.cv');

});




// require __DIR__.'/auth.php';
