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

use App\Cliente;
use App\Endereco;

Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach ($clientes as $c) {
        echo "<p>ID: ". $c->id. "</p>";
        echo "<p>Nome: ". $c->nome. "</p>";
        echo "<p>Telefone: ". $c->telefone. "</p>";
        //$e = Endereco::where('cliente_id', $c->id )->first();
        echo "<p>Rua: ". $c->endereco->rua. "</p>";
        echo "<p>Número: ". $c->endereco->numero. "</p>";
        echo "<p>Bairro: ". $c->endereco->bairro. "</p>";
        echo "<p>Cidade: ". $c->endereco->cidade. "</p>";
        echo "<p>UF: ". $c->endereco->uf. "</p>";
        echo "<p>CEP: ". $c->endereco->cep. "</p>";
        echo "<hr />";

    }
});

Route::get('/enderecos', function () {
    $enderecos = Endereco::all();
    foreach ($enderecos as $e) {
        echo "<p>ID Cliente: ". $e->cliente_id. "</p>";

        echo "<p>Nome: ". $e->cliente->nome. "</p>";
        echo "<p>Telefone: ". $e->cliente->telefone. "</p>";

        echo "<p>Rua: ". $e->rua. "</p>";
        echo "<p>Número: ". $e->numero. "</p>";
        echo "<p>Bairro: ". $e->bairro. "</p>";
        echo "<p>Cidade: ". $e->cidade. "</p>";
        echo "<p>UF: ". $e->uf. "</p>";
        echo "<p>CEP: ". $e->cep. "</p>";
        echo "<hr />";

    }
});

Route::get('/inserir', function () {
    $c = new Cliente();
    $c->nome = "José Almeida";
    $c->telefone = "11 98998-7895";
    $c->save();

    $e = new Endereco();
    $e->rua = "Rua Piauí";
    $e->numero = "77";
    $e->bairro = "Engenho de Dentro";
    $e->cidade = "Rio de Janeiro";
    $e->uf = "RJ";
    $e->cep = "20770-060";

    $c->endereco()->save($e);


    $c = new Cliente();
    $c->nome = "Marly Soares Carvalho";
    $c->telefone = "21 98100-2807";
    $c->save();

    $e = new Endereco();
    $e->rua = "Rua Pedro de Carvalho";
    $e->numero = "50";
    $e->bairro = "Méier";
    $e->cidade = "Rio de Janeiro";
    $e->uf = "RJ";
    $e->cep = "20725-232";

    $c->endereco()->save($e);
});

Route::get('/clientes/json', function () {
    //$clientes = Cliente::All(); //Lazy Loading

    // No caso abaixo ele vai buscar os clientes com seus respectivos endereços, ou outras informações de outros relacionamentos
    $clientes = Cliente::with(['endereco'])->get(); // Você pode especificar outros relacionamentos - Eager Loading
    return $clientes->toJson();
});

Route::get('/enderecos/json', function () {
    //$enderecos = Endereco::All(); //Lazy Loading

    // No caso abaixo ele vai buscar os clientes com seus respectivos endereços, ou outras informações de outros relacionamentos
    $enderecos = Endereco::with(['cliente'])->get(); // Você pode especificar outros relacionamentos - Eager Loading
    return $enderecos->toJson();
});
