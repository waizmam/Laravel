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

use Illuminate\Http\Request;

// retorna a view welcome
Route::get('/', function() {
    return view('welcome');
});

// escreve ou retorna um texto para ser exibido 
Route::get('/ola', function() {
    return '<h1>Seja bem vindo !!</h1>';
});

//recebendo parâmetro sem regra, apenas tratando
Route::get('/repetir/{nome}/{n}', function ($nome,$n) {
    if (is_integer($n)) {
        for ($i=0; $i < $n; $i++) { 
            echo "<h1> Olá, $nome !</h1>";
        }
    }else{
        echo 'Você não digitou um inteiro';
    }    
});

//colocando uma regra na rota através de expressão regular para restringir
Route::get('/seunomecomregra/{nome}/{n}', function ($nome, $n) {
    for ($i=0; $i < $n; $i++) { 
        echo "<h1> Olá, $nome ! ($i)</h1>";
    }
})->where('n','[0-9]+')->where('nome','[A-Za-z]+');

//utilizando a rota com ou sem o parâmetro passado
Route::get('/seunomesemregra/{nome?}', function ($nome = null) {
    if (isset($nome)) {
        echo "<h1> Olá, $nome !</h1>";   
    }else{
        echo 'Você não passou nenhum nome';
    }
    
});

// Agrupamento de rotas,  tenho uma rota principal "app" e depois dela temos "subrotas" (/,profile,about)
Route::prefix('app')->group(function(){
    Route::get('/', function () {
        return "Página principal do APP";
    });
    Route::get('profile', function() {
        return "Página Profile";
    });
    Route::get('about', function() {
        return "Meu About";
    });
});

//redirecionando para outra/nova rota
Route::redirect('/aqui', '/ola', 301);

//redirecionando para view Hello através de rotas
Route::view('/hello', 'hello');

//redirecionando para view Hello através de rotas, com parâmetros
Route::view('/hellonome', 'hellonome',
    [
        'nome' => 'Elom',
        'sobrenome' => 'Carvalho'
    ]
);

//passando parâmetros pela rota/url e passando os valores por parâmetro para view
Route::get('/hellonome/{nome}/{sobrenome}', function($nome,$sn) {
    return view('hellonome',  ['nome' => $nome,'sobrenome' => $sn]);
});

Route::get('/rest/hello', function() {
    return '<h1>Hello (GET)</h1>';
});

Route::post('/rest/hello', function() {
    return '<h1>Hello (POST)</h1>';
});

Route::delete('/rest/hello', function() {
    return '<h1>Hello (DELETE)</h1>';
});

Route::put('/rest/hello', function() {
    return '<h1>Hello (PUT)</h1>';
});

Route::patch('/rest/hello', function() {
    return '<h1>Hello (PATCH)</h1>';
});

Route::options('/rest/hello', function() {
    return '<h1>Hello (OPTIONS)</h1>';
});

// recebendo um valor via uma requisição Request
Route::post('/rest/imprimir', function(Request $request) {
    $nome = $request->input('nome');
    $idade = $request->input('idade');
    return "Hello $nome ($idade)!! (POST)";
});

//Atendendo a dois métodos Http em uma mesma rota
Route::match(['get', 'post'], '/rest/hello2', function() {
    return "Hello World 2";
});

//Atendendo todos os métodos Http através de uma única rota
Route::any('/rest/hello3', function () {
    return "Hello World 3";
});

// Nomeando a Rota para ser usada nos códigos, porém não é possível passar esse nome por parâmetro na url diretamente no browser
// Isso serve para que se eu alterar a rota eu não preciso alterar em muitos lugares, pois o nome da rota permanece a mesma
Route::get('/produtos', function () {
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressora</li>";
    echo "<li>Mouse</li>";
    echo "</ol>";
})->name('meusprodutos');

// criando um link para a rota nomeada
Route::get('/linkprodutos', function() {
    $url = route('meusprodutos');
    echo '<a href="'.$url .'"> Meus produtos</a>' ;
});

Route::get('/redirecionarprodutos', function () {
    return redirect()->route('meusprodutos');
});