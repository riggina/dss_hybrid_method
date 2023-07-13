<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\ShowbyRankController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\DashboardController;



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

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.post');
});

Route::post('register', [RegisterController::class, 'register'])->name('register.post');

Route::middleware('auth')->group(function () {
    Route::get('register', [RegisterController::class, 'showRegisterForm']);
    Route::get('profile', [ProfileController::class, 'profile']);
    Route::post('logout', [LogoutController::class, 'logout']);
    Route::resource('/dashboard', AlternativeController::class);
    Route::get('/dashboard/checkSlug', [AlternativeController::class, 'checkSlug'])->name('alternative_slug');
    Route::get('/peringkat', [ShowbyRankController::class, 'showbyrankdashboard']);
});



Route::get('/alternative', [HomeController::class, 'search']);
Route::get('/alternative/{alternative}', [HomeController::class, 'show']);
Route::post('/filter', [FilterController::class, 'filter'])->name('filter');
Route::get('/dariperingkat', [ShowbyRankController::class, 'showbyrankhome']);


// Route::group(['middleware'=>'is_admin', 'prefix'=>'admin'], function (){
//     Route::get('/dashboard', [AlternatifController::class, index])->name('dashboard');
//     Route::get('/ranking', [AlternatifController::class, ranking])->name('ranking');
// });



