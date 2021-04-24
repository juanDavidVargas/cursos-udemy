<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function(){
    
    Route::get('/', 'App\Http\Controllers\AdminController@index')->name('admin');

    Route::group(['prefix' => 'heroes'], function(){
        Route::get('/', 'App\Http\Controllers\HeroController@index')->name('admin.heroes');
        Route::get('create', 'App\Http\Controllers\HeroController@create')->name('admin.heroes.create');
        Route::post('store', 'App\Http\Controllers\HeroController@store')->name('admin.heroes.store');
        Route::get('edit/{id}', 'App\Http\Controllers\HeroController@edit')->name('admin.heroes.edit');
        Route::post('update/{id}', 'App\Http\Controllers\HeroController@update')->name('admin.heroes.update');
        Route::delete('destroy/{id}', 'App\Http\Controllers\HeroController@destroy')->name('admin.heroes.destroy');
    });
    
    Route::group(['prefix' => 'items'], function(){
        Route::get('/', 'App\Http\Controllers\ItemController@index')->name('admin.items');
        Route::get('create', 'App\Http\Controllers\ItemController@create')->name('admin.items.create');
        Route::post('store', 'App\Http\Controllers\ItemController@store')->name('admin.items.store');
        Route::get('edit/{id}', 'App\Http\Controllers\ItemController@edit')->name('admin.items.edit');
        Route::post('update/{id}', 'App\Http\Controllers\ItemController@update')->name('admin.items.update');
        Route::delete('destroy/{id}', 'App\Http\Controllers\ItemController@destroy')->name('admin.items.destroy');
    });
   
    Route::group(['prefix' => 'enemies'], function(){
        Route::get('/', 'App\Http\Controllers\EnemyController@index')->name('admin.enemies');
        Route::get('create', 'App\Http\Controllers\EnemyController@create')->name('admin.enemies.create');
        Route::post('store', 'App\Http\Controllers\EnemyController@store')->name('admin.enemies.store');
        Route::get('edit/{id}', 'App\Http\Controllers\EnemyController@edit')->name('admin.enemies.edit');
        Route::post('update/{id}', 'App\Http\Controllers\EnemyController@update')->name('admin.enemies.update');
        Route::delete('destroy/{id}', 'App\Http\Controllers\EnemyController@destroy')->name('admin.enemies.destroy');
    });

    Route::get('bs', 'App\Http\Controllers\BSController@index')->name('admin.bs');

});
