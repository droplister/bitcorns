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
    return redirect(route('pages.ico'));
});

Route::get('/home', [
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

Route::put('/farms/{farm}', [
    'as'   => 'farms.update',
    'uses' => 'FarmsController@update',
]);

Route::put('/farms/{farm}/image', [
    'as'   => 'image.update',
    'uses' => 'ImageController@update',
]);

Route::get('/farms/{farm}/edit', [
    'as'   => 'farms.edit',
    'uses' => 'FarmsController@edit',
]);

Route::get('/almanac', [
    'as'   => 'pages.almanac',
    'uses' => 'PagesController@showAlmanac',
]);

Route::get('/faq', [
    'as'   => 'pages.faq',
    'uses' => 'PagesController@showFaq',
]);

Route::get('/ico', [
    'as'   => 'pages.ico',
    'uses' => 'PagesController@showIco',
]);

Route::get('/ico.html', function () {
    return redirect(route('pages.ico'));
});