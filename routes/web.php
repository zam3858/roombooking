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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/rooms/store', 'RoomController@store');

Route::get('/rooms/create', 'RoomController@create');
Route::get('/rooms/{id}', 'RoomController@show')
	->where('id', '[0-9]+');


Route::get('/rooms/{id}/edit', 'RoomController@edit');
Route::post('/rooms/{id}', 'RoomController@update');

Route::get('/rooms/{id}/delete', 'RoomController@destroy');

Route::get('/rooms', 'RoomController@index');
//Route::resource('rooms','RoomController');
