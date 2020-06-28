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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); 
Route::get('/explorer', 'ExplorerController@index')->name('explorer');
Route::get('/my-account', 'ProfileController@index')->middleware('auth');
Route::get('/account/{username}', 'ProfileController@show');
Route::get('/account/{username}/album/{id}', 'ProfileController@album_perfil')->middleware('auth');
Route::get('/albums', 'AlbumController@index')->middleware('auth'); 
Route::get('/album/{id}', 'AlbumController@show');
Route::get('/image/{id}', 'ImageController@show');

Route::post('/follow', 'ProfileController@follow')->middleware('auth');
Route::post('/create-album', 'AlbumController@create_album')->middleware('auth');
Route::post('/add-image', 'AlbumController@add_image')->middleware('auth');