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

Use App\Http\Middleware\PrimeiroMiddleware;

/*Route::get('/usuarios', 'UsuarioController@index')
        ->middleware('primeiro');*/

Route::get('/usuarios', 'UsuarioController@index');

Route::get('/usuarios', 'UsuarioController@index')
    ->middleware('primeiro','segundo');

Route::get('/', function () {
    return 'teste';
});

Route::get('/terceiro', function () {
    return 'passou pelo terceiro middleware';
})->middleware('terceiro:joao,20');



