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
    'as'   => 'players.index',
    'uses' => 'PlayersController@index',
]);

Route::get('/farmer/{player}', [
    'as'   => 'players.show',
    'uses' => 'PlayersController@show',
]);