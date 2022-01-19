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
Route::get('area/edit/{area_id}', 'areaController@edit')->name('editArea');
Route::post('area/update/{area_id}', 'areaController@update')->name('updateArea');
Route::get('area/delete/{area_id}', 'areaController@destroy')->name('deleteArea');
Route::get('area/cetakArea', 'areaController@cetakArea')->name('cetakArea');

//pic
Route::get('pic', 'picController@index')->name('pic');
Route::get('pic/create', 'picController@create')->name('createPic');
Route::post('pic/store', 'picController@store')->name('storePic');
Route::get('pic/edit/{pic_id}', 'picController@edit')->name('editPic');
Route::post('pic/update/{pic_id}', 'picController@update')->name('updatePic');
Route::get('pic/delete/{pic_id}', 'picController@destroy')->name('deletePic');
Route::get('pic/cetakPic', 'picController@cetakPic')->name('cetakPic');

//asset
Route::get('aset', 'asetController@index')->name('aset');
Route::get('aset/create', 'asetController@create')->name('createAset');
Route::post('aset/store', 'asetController@store')->name('storeAset');
Route::get('aset/edit/{aset_id}', 'asetController@edit')->name('editAset');
Route::post('aset/update/{aset_id}', 'asetController@update')->name('updateAset');
Route::get('aset/delete/{aset_id}', 'asetController@destroy')->name('deleteAset');
Route::get('aset/cetakAset', 'asetController@cetakAset')->name('cetakAset');

//rcfa
Route::get('rcfa', 'rcfaController@index')->name('rcfa');
Route::get('rcfa/create', 'rcfaController@create')->name('createRcfa');
Route::post('rcfa/store', 'rcfaController@store')->name('storeRcfa');
Route::get('rcfa/edit/{rcfa_id}', 'rcfaController@edit')->name('editRcfa');
Route::post('rcfa/update/{rcfa_id}', 'rcfaController@update')->name('updateRcfa');
Route::get('rcfa/delete/{rcfa_id}', 'rcfaController@destroy')->name('deleteRcfa');
Route::get('rcfa/cetakRcfa', 'rcfaController@cetakRcfa')->name('cetakRcfa');

//fdt
Route::get('fdt', 'fdtController@index')->name('fdt');
Route::get('fdt/create', 'fdtController@create')->name('createFdt');
Route::post('fdt/store', 'fdtController@store')->name('storeFdt');
Route::get('fdt/edit/{fdt_id}', 'fdtController@edit')->name('editFdt');
Route::post('fdt/update/{fdt_id}', 'fdtController@update')->name('updateFdt');
Route::get('fdt/delete/{fdt_id}', 'fdtController@destroy')->name('deleteFdt');
Route::get('fdt/cetakFdt', 'fdtController@cetakFdt')->name('cetakFdt');

//Progres
Route::get('progres', 'ProgresController@index')->name('progres');
Route::get('progres/create', 'ProgresController@create')->name('createProgres');
Route::post('progres/store', 'ProgresController@store')->name('storeProgres');
Route::get('progres/edit/{progres_id}', 'ProgresController@edit')->name('editProgres');
Route::post('progres/update/{progres_id}', 'ProgresController@update')->name('updateProgres');
Route::get('progres/delete/{progres_id}', 'ProgresController@destroy')->name('deleteProgres');
Route::get('progres/cetakProgres', 'ProgresController@cetakProgres')->name('cetakProgres');

//Halaman Pic
Route::get('/berandaPic', 'berandaPicController@berandaPic')->name('berandaPic');
Route::get('rcfaPic', 'rcfaPicController@index')->name('rcfaPic');
Route::get('fdtPic', 'fdtPicController@index')->name('fdtPic');