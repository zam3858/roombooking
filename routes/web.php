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


/**
 * Ini adalah contoh routing menggunakan closure (iaitu meletakkan function terus
 * sebagai parameter dan ini akan dijalankan apabila pengguna membuat request tersebut
 *
 */
//Route::get('/', function () {
//    return view('welcome');
//});

//ini ditambah oleh php artisan make:auth
Auth::routes();

// asas systax route ialah:
// Route::methodRequestDibuat('/patternUrlDiisiPadaBrowser','ControllerYangAkanDiguna@fungsiYangAkanDipanggil')->name('nama_route_ini');
Route::get('/home', 'HomeController@index')->name('home');

//Ini contoh resource routing yang digunapakai Resource Controller
Route::resource('rooms', 'RoomController');

//Route boleh dimasukkan kedalam satu group. Dibawah ini contoh
//Route group yang menggunakan middleware auth untuk mewajibkan
//login bagi sesiapa hendak mengakses route dibawah ini.
Route::group(['middleware' => 'auth'], function () {

	Route::resource('kegunaans', 'Setup\KegunaanController');

});

