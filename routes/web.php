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

Route::get('/', function () {
    return view('welcome');
});


//Route::resource('productos', 'ProductosController');

Route::prefix('productos')->group(function () {
    Route::get('/', 'ProductosController@index')->name('productos_index');
    Route::get('/create', 'ProductosController@create')->name('productos_create');
    Route::post('/store', 'ProductosController@store')->name('productos_store');
    Route::delete('/destroy/{id}', 'ProductosController@destroy')->name('producto_destroy');
    Route::get('/edit/{id}', 'ProductosController@edit')->name('producto_edit');
    Route::post('/update/{id}', 'ProductosController@update')->name('producto_update');
});
Route::prefix('ventas')->group(function () {
    Route::get('/', 'VentasController@index')->name('ventas_index');
    Route::get('/new', 'VentasController@new')->name('ventas_new');
    Route::post('/create', 'VentasController@create')->name('ventas_create');
    Route::get('/ajax-costo-producto', 'VentasController@costoProducto')->name('ajax_ventas_costo_producto');
});
Route::prefix('inventario')->group(function () {
    Route::get('/', 'InventarioController@index')->name('inventario_index');
    Route::post('/store', 'InventarioController@store')->name('inventario_store');
    Route::get('/new', 'InventarioController@new')->name('inventario_new');
    Route::get('/create', 'InventarioController@create')->name('inventario_create');
    Route::get('/ajuste', 'InventarioController@ajuste')->name('inventario_ajuste');
    Route::delete('/destroy/{id}', 'InventarioController@destroy')->name('inventario_destroy');
    Route::get('/edit/{id}', 'InventarioController@edit')->name('inventario_edit');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
