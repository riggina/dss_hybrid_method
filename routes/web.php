<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;


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
Route::get('/', [HomeController::class, 'index']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::middleware('guest')->group(function () {
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.post');
    Route::post('register', [RegisterController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::get('register', [RegisterController::class, 'showRegisterForm']);
    Route::get('profile', [ProfileController::class, 'profile']);
    // Route::get('dashboard', [AlternativeController::class, 'index']);
    Route::post('logout', [LogoutController::class, 'logout']);
    Route::resource('/dashboard', AlternativeController::class);
    Route::get('/dashboard/checkSlug', [AlternativeController::class, 'checkSlug']);
});



// Route::get('/alternative', [AlternativeController::class, 'index']);
// Route::get('/alternative/{alternative}', [AlternativeController::class, 'show']);


// Route::group(['middleware'=>'is_admin', 'prefix'=>'admin'], function (){
//     Route::get('/dashboard', [AlternatifController::class, index])->name('dashboard');
//     Route::get('/ranking', [AlternatifController::class, ranking])->name('ranking');
// });



