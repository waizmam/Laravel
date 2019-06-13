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

//Rota do tipo get, que manda uma requisição para o Controller
Route::get('/nome', 'MeuControlador@getNome');
Route::get('/idade', 'MeuControlador@getIdade');
//Rota do tipo get com passagem de parâmetro sem regra, que manda uma requisição para o Controller
Route::get('/multiplicar/{n1}/{n2}', 'MeuControlador@multiplicar');
//Rota do tipo get com passagem de parâmetro com regra, que manda uma requisição para o Controller
Route::get('/nomes/{id}', 'MeuControlador@getNomeByID')->where('id','[0-9]+');

// Monta todas rotas e cria um link de todas as rotas com os métodos do Controller informado, para visualizar utilize o php artisan route:list
Route::resource('/cliente', 'ClienteControlador');

Route::post('/cliente/requisitar', 'ClienteControlador@requisitar');