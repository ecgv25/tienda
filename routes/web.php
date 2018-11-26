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
    Route::get('/create', 'VentasController@create')->name('ventas_create');
   
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
