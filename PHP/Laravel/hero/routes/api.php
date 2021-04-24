<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Endpoint testeo
Route::get('/', 'App\Http\Controllers\APIController@index');

//Endpoint Heroes
Route::get('heroes', 'App\Http\Controllers\APIController@getAllHeroes');
Route::get('heroes/{id}', 'App\Http\Controllers\APIController@getHeroe');

//Endpoint enemies
Route::get('enemies', 'App\Http\Controllers\APIController@getAllEnemies');
Route::get('enemies/{id}', 'App\Http\Controllers\APIController@getEnemy');

//Endpoint items
Route::get('items', 'App\Http\Controllers\APIController@getAllItems');
Route::get('items/{id}', 'App\Http\Controllers\APIController@getItem');

// Endpoint BS
Route::get('bs/{heroId}/{enemyId}', 'App\Http\Controllers\APIController@runManualBS');