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

Route::get('/farms', [
    'as'   => 'farms.index',
    'uses' => 'FarmsController@index',
]);

Route::get('/address/{farm}', [
    'as'   => 'farms.show',
    'uses' => 'FarmsController@show',
]);

Route::get('/bitcorn', [
    'as'   => 'pages.bitcorn',
    'uses' => 'PagesController@showBitcorn',
]);

Route::get('/crops', [
    'as'   => 'pages.crops',
    'uses' => 'PagesController@showCrops',
]);