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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/beranda', 'berandaController@beranda')->name('beranda');
//area
Route::get('area', 'areaController@index')->name('area');
Route::get('area/create', 'areaController@create')->name('createArea');
Route::post('area/store', 'areaController@store')->name('storeArea');
