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

//Rutas de Review
Route::get('/review/all', 'ReviewController@index');
Route::get('/review/{id}', 'ReviewController@show');
Route::post('/review/new', 'ReviewController@store');
Route::put('/review/update/{id}', 'ReviewController@update');
Route::delete('/review/delete/{id}', 'ReviewController@destroy');

//Rutas de Role
Route::get('/role/all', 'RoleController@index');
Route::get('/role/{id}', 'RoleController@show');
Route::post('/role/new', 'RoleController@store');
Route::put('/role/update/{id}', 'RoleController@update');
Route::delete('/role/delete/{id}', 'RoleController@destroy');