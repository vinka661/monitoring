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

//pic
Route::get('pic', 'picController@index')->name('pic');
Route::get('pic/create', 'picController@create')->name('createPic');
Route::post('pic/store', 'picController@store')->name('storePic');
Route::get('pic/edit/{pic_id}', 'picController@edit')->name('editPic');
Route::post('pic/update/{pic_id}', 'picController@update')->name('updatePic');
Route::get('pic/delete/{pic_id}', 'picController@destroy')->name('deletePic');

//asset
Route::get('asset', 'assetController@index')->name('asset');
Route::get('asset/create', 'assetController@create')->name('createAsset');
Route::post('asset/store', 'assetController@store')->name('storeAsset');
Route::get('asset/edit/{asset_id}', 'assetController@edit')->name('editAsset');
Route::post('asset/update/{asset_id}', 'assetController@update')->name('updateAsset');
Route::get('asset/delete/{asset_id}', 'assetController@destroy')->name('deleteAsset');

//rcfa
Route::get('rcfa', 'rcfaController@index')->name('rcfa');
Route::get('asset/create', 'rcfaController@create')->name('createRcfa');