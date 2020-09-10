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

Route::view('/cuenta','cuenta');
Route::view('/misproductos','ownProducts');

Route::get('/logged', 'CategoryController@indexVisible');
Route::get('/', 'CategoryController@home');
//Route::get('/{data}', 'CategoryController@indexAll');
//Route::get('/logged', 'CategoryController@indexVisible');
Route::get('/', 'CategoryController@home');


//login
Route::get('/login', 'CategoryController@log');



//VISTA NUEVO USUARIO
Route::get('/usuario/nuevousuario','CategoryController@home2');

//Rutas de cuentas
Route::get('/account/all', 'AccountController@indexAll');
Route::get('/account/allvisible', 'AccountController@indexVisible');
Route::get('/account/{id}', 'AccountController@show');
Route::post('/account/new', 'AccountController@store');
Route::put('/account/update/{id}', 'AccountController@update');
Route::delete('/account/delete/{id}', 'AccountController@deleteData');
Route::put('/account/deletevis/{id}', 'AccountController@deleteVisibility');

//Rutas de categorias
Route::get('/category/all', 'CategoryController@indexAll');

//Route::get('/category/allvisible', 'CategoryController@indexVisible')->name('allCategory');

Route::get('/category/{id}', 'CategoryController@show');
Route::post('/category/new', 'CategoryController@store');
Route::put('/category/update/{id}', 'CategoryController@update');
Route::delete('/category/delete/{id}', 'CategoryController@deleteData');
Route::put('/category/deletevis/{id}', 'CategoryController@deleteVisibility');

//Rutas de historial
Route::get('/history/all', 'HistoryController@indexAll');
Route::get('/history/allvisible', 'HistoryController@indexVisible');
Route::get('/history/{id}', 'HistoryController@show');
Route::post('/history/new', 'HistoryController@store');
Route::put('/history/update/{id}', 'HistoryController@update');
Route::delete('/history/delete/{id}', 'HistoryController@deleteData');
Route::put('/history/deletevis/{id}', 'HistoryController@deleteVisibility');

//Rutas de pagos
Route::get('/payment/all', 'PaymentController@indexAll');
Route::get('/payment/allvisible', 'PaymentController@indexVisible');
Route::get('/payment/{id}', 'PaymentController@show');
Route::post('/payment/new', 'PaymentController@store');
Route::put('/payment/update/{id}', 'PaymentController@update');
Route::delete('/payment/delete/{id}', 'PaymentController@deleteData');
Route::delete('/payment/deletevis/{id}', 'PaymentController@deleteVisibility');

//Rutas de Review
Route::get('/review/all', 'ReviewController@indexAll');
Route::get('/review/allvisible', 'ReviewController@indexVisible');
Route::get('/review/{id}', 'ReviewController@show');
Route::post('/review/new', 'ReviewController@store');
Route::put('/review/update/{id}', 'ReviewController@update');
Route::delete('/review/delete/{id}', 'ReviewController@deleteData');
Route::put('/review/deletevis/{id}', 'ReviewController@deleteVisibility');

//Rutas de Role
Route::get('/role/all', 'RoleController@indexAll');
Route::get('/role/allvisible', 'RoleController@indexVisible');
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
Route::get('/permission/all', 'PermissionController@indexAll');
Route::get('/permission/allvisible', 'PermissionController@indexVisible');
Route::get('/permission/{id}', 'PermissionController@show');
Route::post('/permission/new', 'PermissionController@store');
Route::put('/permission/update/{id}', 'PermissionController@update');
Route::delete('/permission/delete/{id}', 'PermissionController@deleteData');
Route::put('/permission/deletevis/{id}', 'PermissionController@deleteVisibility');

//Rutas de productos
Route::get('/product/all', 'ProductController@indexAll');
Route::get('/product/allvisible', 'ProductController@indexVisible');
Route::get('/product/{id}', 'ProductController@show');
Route::post('/product/new', 'ProductController@store')->name('addProduct');
Route::put('/product/update/{id}', 'ProductController@update');
Route::delete('/product/delete/{id}', 'ProductController@deleteData');
Route::put('/product/deletevis/{id}', 'ProductController@deleteVisibility');

//Rutas de usuario
Route::get('/user/all','UserController@indexAll');
Route::get('/user/allvisible', 'UserController@indexVisible');
Route::get('/user/{id}','UserController@show');
Route::post('/user/new','UserController@store')->name('addUser');
Route::put('/user/update/{id}', 'UserController@update');
Route::delete('/user/delete/{id}', 'UserController@deleteData');
Route::delete('/user/deletevis/{id}', 'UserController@deleteVisibility');

//Rutas de transaccion
Route::get('/transaction/all','TransactionController@indexAll');
Route::get('/transaction/allvisible', 'TransactionController@indexVisible');
Route::get('/transaction/{id}','TransactionController@show');
Route::post('/transaction/new','TransactionController@store');
Route::put('/transaction/update/{id}', 'TransactionController@update');
Route::delete('/transaction/delete/{id}', 'TransactionController@destroy');

//Rutas de Permiso-Rol
Route::get('/permissionrole/all', 'PermissionRoleController@indexAll');

Route::get('/permissionrole/{id}', 'PermissionRoleController@show');
Route::post('/permissionrole/new', 'PermissionRoleController@store');
Route::put('/permissionrole/update/{id}', 'PermissionRoleController@update');
Route::delete('/permissionrole/delete/{id}', 'PermissionRoleController@deleteData');
//Route::get('/permissionrole/allvisible', 'PermissionRoleController@indexVisible');
//Route::put('/permissionrole/deletevis/{id}', 'PermissionRoleController@deleteVisibility');

Route::delete('/transaction/delete/{id}', 'TransactionController@deleteData');
Route::delete('/transaction/deletevis/{id}', 'TransactionController@deleteVisibility');

//Rutas de CategoryProduct
Route::get('/categoryproduct/all', 'CategoryProductController@indexAll');
Route::get('/categoryproduct/{id}', 'CategoryProductController@show');
Route::post('/categoryproduct/new', 'CategoryProductController@store');
Route::put('/categoryproduct/update/{id}', 'CategoryProductController@update');
Route::delete('/categoryproduct/delete/{id}', 'CategoryProductController@deleteData');


///   PROBANDO   ///
//Para publicar un producto
Route::get('/publicarproducto', 'ProductController@publicarProducto');

//Login
Route::get('/login', 'LoginController@loginHome');
Route::post('/login/userAuth', 'LoginController@ingresoDatosLogin')->name('ingresoDatosLogin');
Route::post('/log', 'LoginController@login')->name('log');
