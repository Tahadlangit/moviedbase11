<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/movies', 'API\MovieController@index');
    Route::get('/movies/{id}', 'API\MovieController@show');
    Route::get('/directors/{id}', 'API\MovieController@getDirector');



});

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/movies', 'MovieController@index');
//     Route::get('/movies/{id}', 'MovieController@show');
//     Route::get('/directors/{id}', 'DirectorController@show');
//     Route::get('/actors/{id}', 'ActorController@show');
//     Route::get('/movies-with-genres', 'MovieController@withGenres');
//     Route::get('/movies-with-ratings', 'MovieController@withRatings');
// });
