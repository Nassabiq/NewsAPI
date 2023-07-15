<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {

    // NEWS SECTION
    Route::middleware('role')->group(function () {
        Route::post('/news', [NewsController::class, 'store']);
        Route::patch('/news/{news}', [NewsController::class, 'update']);
        Route::delete('/news/{news}', [NewsController::class, 'destroy']);
    });

    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/{news}', [NewsController::class, 'show']);

    Route::post('/news/comment/{news}', [NewsController::class, 'comments']);


    //Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
