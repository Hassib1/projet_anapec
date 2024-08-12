<?php

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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\OffreController;
Route::resource('slides',SlideController::class);
Route::resource('actualites',ActualiteController::class);


Route::resource('offres', OffreController::class);

Auth::routes();

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
