<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

  Route::get('/places', [PlaceController::class, 'getPlaces']);
  Route::get('/places/typ/{type}',[PlaceController::class, 'getPlacesByTypes']);
  Route::get('/places/{id}', [PlaceController::class, 'getPlacesById']);
  Route::post('/addPlaces', [PlaceController::class, 'store']);
  Route::patch('/editPlaces/{id}', [PlaceController::class, 'update']);
  Route::post('/delPlaces/{id}', [PlaceController::class, 'destroy']);

  
  