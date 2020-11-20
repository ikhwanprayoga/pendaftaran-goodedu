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

Route::group(['prefix' => 'get-data'], function () {
    Route::get('sekolah', 'PendaftaranController@get_data_sekolah')->name('get-data.sekolah');
    Route::get('universitas', 'PendaftaranController@get_data_universitas')->name('get-data.universitas');
});

Route::group(['prefix' => 'pendaftaran'], function () {
    Route::get('/', 'PendaftaranController@index')->name('pendaftaran.index');
    Route::post('/store', 'PendaftaranController@store')->name('pendaftaran.store');
    Route::get('/detail/{id}', 'PendaftaranController@detail')->name('pendaftaran.detail');
});