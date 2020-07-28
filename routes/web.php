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

//  ROUTES UNIDADES FEDERATIVAS
Route::get('/','UfController@index');
Route::get('/uf', 'UfController@index')->name('site.uf');
Route::post('/uf', 'UfController@store');
Route::put('/uf/{siglaUf}', 'UfController@update')->name('edit.uf');
Route::delete('uf/{siglaUf}', 'UfController@delete')->name('delete.uf');

//  ROUTES MUNICIPIOS
Route::get('/municipio', 'MunicipioController@index')->name('site.municipio');
Route::post('/municipio', 'MunicipioController@store')->name('store.municipio');
Route::put('/municipio/{cod}', 'MunicipioController@update')->name('edit.municipio');
Route::delete('/municipio/{cod}', 'MunicipioController@delete')->name('delete.municipio');

