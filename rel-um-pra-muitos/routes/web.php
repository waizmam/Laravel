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

use App\Produto;
use App\Categoria;

Route::get('/categorias', function () {
    $categoria = Categoria::all();
    if(count($categoria) === 0){
        echo "<h4>Você não possui nenhuma categoria cadastrada</h4>";
    }else{
        foreach ($categoria as $c) {
            echo '<p>'.$c->id.' - '. $c->nome.'</p>';
        }
    }
});

Route::get('/produtos', function () {
    $produtos = Produto::all();
    if(count($produtos) === 0){
        echo "<h4>Você não possui nenhum produto cadastrada</h4>";
    }else{
        echo "<table>";
        echo "<thead><tr><td>Nome</td><td>Estoque</td><td>Preco</td><td>Categoria</td></tr></thead>";
        echo "<tbody>";
        foreach ($produtos as $p) {
            echo "<tr>";
            echo '<td>'.$p->nome.'</td>';
            echo '<td>'.$p->estoque.'</td>';
            echo '<td>'.$p->preco.'</td>';
            echo '<td>'.$p->categoria->nome.'</td>';

            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }

});

Route::get('/categoriasprodutos', function () {
    $categoria = Categoria::all();
    if(count($categoria) === 0){
        echo "<h4>Você não possui nenhuma categoria cadastrada</h4>";
    }else{
        foreach ($categoria as $c) {
            echo '<p>'.$c->id.' - '. $c->nome.'</p>';
            $produtos = $c->produtos;
            if(count($produtos)>0){
                echo "<ul>";
                foreach ($produtos as $p) {
                    echo "<li>".$p->nome."</li>";
                }
                echo "</ul>";
            }
        }
    }
});

Route::get('/categoriasprodutos/json', function () {
    //$categoria = Categoria::all(); // lazy loading
    $categoria = Categoria::with('produtos')->get();
    return $categoria->toJson();
});

Route::get('/adicionarproduto', function () {
    $categoria = Categoria::find(1); // lazy loading
    $p = new Produto();
    $p->nome = "Meu novo Produto";
    $p->estoque = 10;
    $p->preco = 100;
    //$p->categoria_id = 1;
    $p->categoria()->associate($categoria); // associando a categoria ao produto
    $p->save();
    return $p->toJson();
});

Route::get('/removerprodutocategoria', function () {
    $p = Produto::find(10); // lazy loading
    if(isset($p)){
        $p->categoria()->dissociate(); // desassociando a categoria ao produto
        $p->save();
    }
    return $p->toJson();
});

Route::get('/adicionarproduto/{catid}', function($catid) {
    //$categoria = Categoria::all(); // lazy loading
    $categoria = Categoria::with('produtos')->find($catid);

    $p = new Produto();
    $p->nome = "Meu novo Produto Adicionado 2";
    $p->estoque = 10;
    $p->preco = 100;

    if(isset($p)){
        $categoria->produtos()->save($p);
    }
    $categoria->load('produtos'); // atualziando a relação dos produtos
    return $categoria->toJson();
});
