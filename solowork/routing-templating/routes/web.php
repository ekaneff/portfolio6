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

Route::get('/', function () {
    return view('mainpage.index');
});

Route::get('/one', function () {
    return view('mainpage.one');
});

Route::get('/two', function () {
    return view('mainpage.two');
});

Route::get('/three', function () {
    return view('mainpage.three');
});

Route::get('/four', 'MainController@index');

