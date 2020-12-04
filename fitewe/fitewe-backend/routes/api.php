<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaceController;

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

Route::post('/login',[AuthController::class, 'login'])->name('login');
Route::post('/register',[UserController::class, 'store']);

Route::middleware('auth:api')->group(function(){
// User routes //
Route::get('/user/all', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show'])->where('id', '[0-9]+');
Route::get('/user/me', [UserController::class, 'userDetails']);
Route::put('/user/update', [UserController::class, 'update']);
Route::post('/logout',[AuthController::class, 'logout']);
});

// Destinations routes //
Route::apiResource('destinations', 'App\Http\Controllers\DestinationController');

// Comments routes //
Route::apiResource('comments', 'App\Http\Controllers\CommentController');
Route::get('comments/place/{place_id}',['as'=>'comment.place_id','uses'=>'App\Http\Controllers\CommentController@getCommentsByPlace']);
Route::get('comments/user/{user_id}',['as'=>'comment.user_id','uses'=>'App\Http\Controllers\CommentController@getCommentsByUser']);

// Suggested places routes //
Route::apiResource('suggplaces', 'App\Http\Controllers\SuggestedPlaceController');
Route::get('suggplaces/user/{user_id}',['as'=>'suggplace.user_id','uses'=>'App\Http\Controllers\SuggestedPlaceController@getSuggestedPlacesByUser']);

// Places Routes //
Route::get('/places', [PlaceController::class, 'getPlaces']);
Route::get('/places/type/{type}',[PlaceController::class, 'getPlacesByTypes']);
Route::get('/places/{id}', [PlaceController::class, 'getPlacesById']);
Route::post('/addPlaces', [PlaceController::class, 'store']);
Route::patch('/editPlaces/{id}', [PlaceController::class, 'update']);
Route::post('/delPlaces/{id}', [PlaceController::class, 'destroy']);
