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
    return view('welcome');
});

Route::get('/farmers', [
    'as'   => 'farmers.index',
    'uses' => 'FarmersController@index',
]);

Route::get('/address/{farmer}', [
    'as'   => 'farmers.show',
    'uses' => 'FarmersController@show',
]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

