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
    return view('index');
});

Route::get('/produtos', 'ProdutoController@index');
Route::get('/produtos/novo', 'ProdutoController@create');
Route::post('/produtos', 'ProdutoController@store');
Route::get('/produtos/editar/{id}', 'ProdutoController@edit');
Route::post('/produtos/{id}', 'ProdutoController@update');
Route::get('/produtos/apagar/{id}', 'ProdutoController@destroy');

Route::get('/categorias', 'CategoriaController@index');
Route::get('/categorias/novo', 'CategoriaController@create');
Route::post('/categorias', 'CategoriaController@store');
Route::get('/categorias/apagar/{id}', 'CategoriaController@destroy');
Route::get('/categorias/editar/{id}', 'CategoriaController@edit');
Route::post('/categorias/{id}', 'CategoriaController@update');
