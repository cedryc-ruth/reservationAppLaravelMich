<?php

use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\ShowApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Public routes

Route::get('/showApi',[ShowApiController::class,'index']);
Route::get('/showApi/{showApi}',[ShowApiController::class,'show']);
Route::get('/showApi/search/{title}',[ShowApiController::class,'search']);
Route::post('/login',[AuthApiController::class,'login']);  // La route pour se logger.


// Protected routes avec sanctum

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('showApi', ShowApiController::class)->except(['index','show']); // Toutes les routes sauf index et show
    Route::get('/logout', [AuthApiController::class,'logout']);
});
