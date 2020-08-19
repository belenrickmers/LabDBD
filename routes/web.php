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

//Rutas de pagos
Route::get('/payment/all', 'PaymentController@index');
Route::get('/payment/{id}', 'PaymentController@show');
Route::post('/payment', 'PaymentController@store');
Route::put('/payment/{id}', 'PaymentController@update');
Route::delete('/payment/delete/{id}', 'PaymentController@destroy');

//Rutas de Review
Route::get('/review/all', 'ReviewController@index');
Route::get('/review/{id}', 'ReviewController@show');
Route::post('/review/new', 'ReviewController@store');
Route::put('/review/update/{id}', 'ReviewController@update');
Route::delete('/review/delete/{id}', 'ReviewController@deleteData');
Route::put('/review/deletevis/{id}', 'ReviewController@deleteVisibility');

//Rutas de Role
Route::get('/role/all', 'RoleController@index');
Route::get('/role/{id}', 'RoleController@show');
Route::post('/role/new', 'RoleController@store');
Route::put('/role/update/{id}', 'RoleController@update');
Route::delete('/role/delete/{id}', 'RoleController@deleteData');
Route::put('/role/deletevis/{id}', 'RoleController@deleteVisibility');

//Rutas de UserProduct
Route::get('/userproduct/all', 'UserProductController@index');
Route::get('/userproduct/{id}', 'UserProductController@show');
Route::post('/userproduct/new', 'UserProductController@store');
Route::put('/userproduct/update/{id}', 'UserProductController@update');
Route::delete('/userproduct/delete/{id}', 'UserProductController@deleteData');

//Rutas de permisos
Route::get('/permission/all', 'PermissionController@index');
Route::get('/permission/{id}', 'PermissionController@show');
Route::post('/permission', 'PermissionController@store');
Route::put('/permission/{id}', 'PermissionController@update');
Route::delete('/permission/delete/{id}', 'PermissionController@deleteData');
Route::put('/permission/deletevis/{id}', 'PermissionController@deleteVisibility');

//Rutas de productos
Route::get('/product/all', 'ProductController@index');
Route::get('/product/{id}', 'ProductController@show');
Route::post('/product', 'ProductController@store');
Route::put('/product/{id}', 'ProductController@update');
Route::delete('/product/delete/{id}', 'ProductController@destroy');

//Rutas de usuario
Route::get('/user/all','UserController@index');
Route::get('/user/{id}','UserController@show');
Route::post('/user','UserController@store');
Route::put('/user/{id}', 'UserController@update');
Route::delete('/user/delete/{id}', 'UserController@destroy');

//Rutas de transaccion
Route::get('/transaction/all','TransactionController@index');
Route::get('/transaction/{id}','TransactionController@show');
Route::post('/transaction','TransactionController@store');
Route::put('/transaction/{id}', 'TransactionController@update');
Route::delete('/transaction/delete/{id}', 'TransactionController@destroy');