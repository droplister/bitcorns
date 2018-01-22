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

Route::get('/farms/{farm}', [
    'as'   => 'farms.show',
    'uses' => 'FarmsController@show',
]);

Route::get('/faq', [
    'as'   => 'pages.faq',
    'uses' => 'PagesController@showFaq',
]);

Route::get('/ico', [
    'as'   => 'pages.ico',
    'uses' => 'PagesController@showIco',
]);