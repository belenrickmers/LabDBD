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

//Rutas de cuentas
Route::get('/account/all', 'AccountController@index');
Route::get('/account/{id}', 'AccountController@show');
Route::post('/account', 'AccountController@store');
Route::put('/account/{id}', 'AccountController@update');
Route::delete('/account/delete/{id}', 'AccountController@destroy');

//Rutas de categorias
Route::get('/category/all', 'CategoryController@index');
Route::get('/category/{id}', 'CategoryController@show');
Route::post('/category', 'CategoryController@store');
Route::put('/category/{id}', 'CategoryController@update');
Route::delete('/category/delete/{id}', 'CategoryController@destroy');

//Rutas de historial
Route::get('/history/all', 'HistoryController@index');
Route::get('/history/{id}', 'HistoryController@show');
Route::post('/history', 'HistoryController@store');
Route::put('/history/{id}', 'HistoryController@update');
Route::delete('/history/delete/{id}', 'HistoryController@destroy');

