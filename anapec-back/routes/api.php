<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\OffreController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// routes/api.php
Route::get('actualite',[ActualiteController::class,'actualite']);
Route::get('latest', [SlideController::class, 'latest']);
Route::get('offre',[OffreController::class,'offre']);
Route::get('/offres/{id}', [OffreController::class, 'show_two']);

