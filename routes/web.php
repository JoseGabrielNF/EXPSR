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

Route::get('/albums', 'AlbumController@index')->middleware('auth');
Route::get('/album/{id}', 'AlbumController@show');

Route::post('/albums', 'AlbumController@createAlbum')->middleware('auth');
Route::post('/album', 'AlbumController@addImage')->middleware('auth');

Route::get('/image/{id}', 'ImageController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); 