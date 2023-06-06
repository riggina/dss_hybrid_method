<?php

use Illuminate\Support\Facades\Route;
use App\Models\Alternatif;
use App\Http\Controllers\AlternatifController;

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
Route::view('/', 'pages/home');
Route::view('/result', 'pages/result');
Route::view('/idresult', 'pages/detailresult');
Route::view('/dashboard', 'pages/dashboard');
Route::view('/peringkat', 'pages/ranking');
// Route::get('/idresult', [AlternatifController::class, 'index']);
// Route::get('/', [AlternatifController::class, 'index']);
// Route::get('/{alternatif:slug}', [AlternatifController::class, 'show']);



