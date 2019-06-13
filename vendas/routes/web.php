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

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function () {
    //Selecionando todos os dados de Categorias
    $cats = DB::table('categorias')->get();
    foreach ($cats as $c) {
        echo "id: " . $c->id . " ; ";
        echo "nome: " . $c->nome . " <br> ";
    }

    echo "<hr>";
    //Selecionando todos os registros da coluna nome de Categorias 
    $nomes = DB::table('categorias')->pluck('nome');
    foreach ($nomes as $nome) {        
        echo "$nome <br> ";
    }

    echo "<hr>";
    //Selecionando a Categorias de id = 1
    $cats = DB::table('categorias')->where('id',1)->get();
    foreach ($cats as $c) {
        echo "id: " . $c->id . " ; ";
        echo "nome: " . $c->nome . " <br> ";
    }

    echo "<hr>";
    //Selecionando o primeiro e único registro da Categoria de id = 1
    $cat= DB::table('categorias')->where('id',1)->first();    
    echo "id: " . $cat->id . " ; ";
    echo "nome: " . $cat->nome . " <br> ";
    
    echo "<hr>";

    echo "<p>Retorna um aray utilizando like</p>";
    //Selecionando a Categorias que possui a letra a no nome
    $cats= DB::table('categorias')->where('nome','like','%a%')->get();    
    foreach ($cats as $c) {
        echo "id: " . $c->id . " ; ";
        echo "nome: " . $c->nome . " <br> ";
    }

    echo "<hr>";

    echo "<p>Sentenças Lógicas</p>";

    $cats= DB::table('categorias')->where('id',1)->orWhere('id',3)->get();    
    foreach ($cats as $c) {
        echo "id: " . $c->id . " ; ";
        echo "nome: " . $c->nome . " <br> ";
    }

    echo "<hr>";

    echo "<p>Intervalos</p>";

    $cats= DB::table('categorias')->whereBetween('id',[1,3])->get();    
    foreach ($cats as $c) {
        echo "id: " . $c->id . " ; ";
        echo "nome: " . $c->nome . " <br> ";
    }

    echo "<hr>";
    echo "<p>Intervalos</p>";

    $cats= DB::table('categorias')->whereNotBetween('id',[1,3])->get();    
    foreach ($cats as $c) {
        echo "id: " . $c->id . " ; ";
        echo "nome: " . $c->nome . " <br> ";
    }

    echo "<hr>";
    echo "<p>Intervalos</p>";

    $cats= DB::table('categorias')->whereIn('id',[1,3,4])->get();    
    foreach ($cats as $c) {
        echo "id: " . $c->id . " ; ";
        echo "nome: " . $c->nome . " <br> ";
    }

    echo "<hr>";
    echo "<p>Intervalos</p>";

    $cats= DB::table('categorias')->whereNotIn('id',[1,3,4])->get();    
    foreach ($cats as $c) {
        echo "id: " . $c->id . " ; ";
        echo "nome: " . $c->nome . " <br> ";
    }

    
    echo "<hr>";

    echo "<p>Sentenças Lógicas</p>";

    $cats= DB::table('categorias')->where([
        ['id',1],
        ['nome', 'móveis']
    ])->get();    
    foreach ($cats as $c) {
        echo "id: " . $c->id . " ; ";
        echo "nome: " . $c->nome . " <br> ";
    }

    echo "<hr>";

    echo "<p>Ordenando por nome - ordem decrescente</p>";

    $cats= DB::table('categorias')->orderBy('nome','desc')->get();    
    foreach ($cats as $c) {
        echo "id: " . $c->id . " ; ";
        echo "nome: " . $c->nome . " <br> ";
    }



});


Route::get('/novascategorias', function () {
    DB::table('categorias')->insert([
        ['nome' =>'Alimentos'],
        ['nome' =>'Informática'],
        ['nome' =>'Cozinha']
    ]);
});

Route::get('/novascategoriasinsertid', function () {
    $id = DB::table('categorias')->insertGetId([
        'nome' =>'Carros'
    ]);
    echo "novo ID = $id <br>";
});

Route::get('/atualizacategorias', function () {
    echo "<p>Antes da Atualização</p>";
    $cat= DB::table('categorias')->where('id',2)->first();    
    echo "id: " . $cat->id . " ; ";
    echo "nome: " . $cat->nome . " <br> ";

    DB::table('categorias')->where('id',2)
        ->update(['nome' => "Roupas infantis"]);  

    echo "<p>Depois da Atualização</p>";
    $cat= DB::table('categorias')->where('id',2)->first();    
    echo "id: " . $cat->id . " ; ";
    echo "nome: " . $cat->nome . " <br> ";
});

Route::get('/removendocategorias', function () {
    echo "<p>Antes da Remoção</p>";
    $cats = DB::table('categorias')->get();
    foreach ($cats as $c) {
        echo "id: " . $c->id . " ; ";
        echo "nome: " . $c->nome . " <br> ";
    }

    echo "<hr>";

    DB::table('categorias')->where('id',2)->delete();  

    echo "<p>Depois da Remoção</p>";
    $cats = DB::table('categorias')->get();
    foreach ($cats as $c) {
        echo "id: " . $c->id . " ; ";
        echo "nome: " . $c->nome . " <br> ";
    }
});
