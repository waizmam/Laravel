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
    return view('pagina');
});

//Chamando uma view atráves de uma rota, sem passagem de parâmetro
Route::get('/primeiraview', function () {
    return view('minhaview');
});
//Chamando uma view atráves de uma rota, com passagem de parâmetro
//with -> é uma função que recebe dois parâmetros (nomeDaVariavel,valorDaVariavel)
Route::get('/ola', function () {
    return view('minhaview')->with('nome','Elom')->with('sobrenome','Carvalho');
});

//Chamando uma view atráves de uma rota, com recebimento e passagem de parâmetro
/*  compact -> é um função que cria um array associativo, você informa apenas o nome das variáveis, 
    que respeita as mesmas criadas respectivamente na function
*/
Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome){
    return view('minhaview', compact('nome','sobrenome'));
});

//Verifica se a view Existe ou não através da Função View::exists(nomeDaView)
Route::get('email/{email}', function ($email) {
    if(View::exists('email')){
        return view('email', compact('email'));
    }else{
        return view('erro');
    }
});


Route::get('/produtos','ProdutoControlador@listar');
Route::get('/secaoprodutos/{palavra}','ProdutoControlador@secaoprodutos');
Route::get('/mostraropcoes','ProdutoControlador@mostraropcoes');
Route::get('/opcoes/{opcao}','ProdutoControlador@opcoes');
Route::get('/loop/foreach','ProdutoControlador@loopForeach');


