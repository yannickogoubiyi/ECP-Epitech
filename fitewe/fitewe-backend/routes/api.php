<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

// User Routes //
Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::post('/register',[UserController::class, 'store']);

Route::middleware('auth:api')->group(function(){
    Route::get('/user/all', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show'])->where('id', '[0-9]+');
    Route::get('/user/me', [UserController::class, 'userDetails']);
    Route::put('/user/update', [UserController::class, 'update']);
    Route::post('/logout',[AuthController::class, 'logout']);
});

// User Routes //
