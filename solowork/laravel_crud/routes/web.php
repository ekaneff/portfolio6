<?php

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

Route::get('/', 'ItemController@index');

Route::get('/items/create', 'ItemController@create');

Route::post('/items/store', 'ItemController@store');

Route::get('/items/{id}', 'ItemController@show');

Route::get('/items/{id}/edit', 'ItemController@edit');

Route::post('/items/{id}/update', 'ItemController@update');

Route::get('/items/{id}/destroy', 'ItemController@destroy');

//Route::resource('items', 'ItemController');
