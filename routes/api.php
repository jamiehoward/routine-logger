<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/routines', 'RoutineController@index');
Route::middleware('auth:api')->get('/routines/{routine}', 'RoutineController@show');
Route::middleware('auth:api')->post('/routines', 'RoutineController@store');

Route::middleware('auth:api')->post('/routines/{routine}/entries', 'EntryController@store');