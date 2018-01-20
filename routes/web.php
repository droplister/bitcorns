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

Route::get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index',
]);

Route::get('/farms/{list?}', [
    'as'   => 'farms.index',
    'uses' => 'FarmsController@index',
]);

Route::get('/address/{farm}', [
    'as'   => 'farms.show',
    'uses' => 'FarmsController@show',
]);

Route::get('/almanac', [
    'as'   => 'pages.almanac',
    'uses' => 'PagesController@showAlmanac',
]);

Route::get('/game', [
    'as'   => 'pages.game',
    'uses' => 'PagesController@showGame',
]);

Route::get('/ico', [
    'as'   => 'pages.ico',
    'uses' => 'PagesController@showIco',
]);