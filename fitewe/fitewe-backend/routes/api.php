<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('destinations', 'App\Http\Controllers\DestinationController');


Route::apiResource('comments', 'App\Http\Controllers\CommentController');

Route::get('comments/place/{place_id}',['as'=>'comment.place_id','uses'=>'App\Http\Controllers\CommentController@getCommentsByPlace']);

Route::get('comments/user/{user_id}',['as'=>'comment.user_id','uses'=>'App\Http\Controllers\CommentController@getCommentsByUser']);


Route::apiResource('suggplaces', 'App\Http\Controllers\SuggestedPlaceController');

Route::get('suggplaces/user/{user_id}',['as'=>'suggplace.user_id','uses'=>'App\Http\Controllers\SuggestedPlaceController@getSuggestedPlacesByUser']);
