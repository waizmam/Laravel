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
use App\Categoria;

//Selecionar todoas as categorias
Route::get('/', function () {
    $categorias = Categoria::all();
    foreach ($categorias as $c) {
        echo "id: ". $c->id . ', ';
        echo "nome: ". $c->nome . '<br>';
    }
});

//criando nova categoria
Route::get('/inserir/{nome}', function($nome){
    $cat = new Categoria(); // instanciando a classe categoria
    $cat->nome = $nome;  // inserindo o novo valor no atributo nome da objeto Categoria  
    $cat->save(); // save serve para salvar o novo dado na categoria
    return redirect('/');
});

//Selecionar categorias pelo id usando o find
Route::get('/categoria/{id}', function($id){
    $categoria = Categoria::findOrFail($id); // find
    if(isset($categoria)){
        echo "id: ". $categoria->id . ', ';
        echo "nome: ". $categoria->nome . '<br>';
    }else{
        echo '<h1>Categoria não encontrada</h1>';
    }     
});

//Selecionar categorias pelo id usando o find e depois alterando o atributo nome
Route::get('/atualizar/{id}/{nome}', function($id,$nome){
    $categoria = Categoria::find($id); // find    
    
    if(isset($categoria)){
       $categoria->nome = $nome;
       $categoria->save();
       return redirect('/');
    }else{
        echo '<h1>Categoria não encontrada</h1>';
    }     
});

//Selecionar categorias pelo id usando o find e depois remover a categoria
Route::get('/remover/{id}', function($id){
    $categoria = Categoria::find($id); // find    
    
    if(isset($categoria)){       
        $categoria->delete();
        return redirect('/');
    }else{
        echo '<h1>Categoria não encontrada</h1>';
    }     
});

Route::get('/categoriapornome/{nome}', function($nome){
    $categorias = Categoria::where('nome', $nome)->get();
    
    if(isset($categorias)){       
        foreach ($categorias as $c) {
            echo "id: ". $c->id . ', ';
            echo "nome: ". $c->nome . '<br>';
        }
    }else{
        echo '<h1>Categoria não encontrada</h1>';
    }      
});

Route::get('/categoriaidmaiorque/{id}', function($id){
    $categorias = Categoria::where('id','>', $id)->get();
    
    if(isset($categorias)){       
        foreach ($categorias as $c) {
            echo "id: ". $c->id . ', ';
            echo "nome: ". $c->nome . '<br>';
        }
    }else{
        echo '<h1>Categoria não encontrada</h1>';
    }      

    $count = Categoria::where('id','>', $id)->count();
    echo "<h1>Count: $count</h1><br>";
    $max = Categoria::where('id','>', $id)->max('id');
    echo "<h1>Count: $max</h1><br>";
});

Route::get('/ids123', function(){
    $categorias = Categoria::find([5,2,3]);
    
    if(isset($categorias)){       
        foreach ($categorias as $c) {
            echo "id: ". $c->id . ', ';
            echo "nome: ". $c->nome . '<br>';
        }
    }else{
        echo '<h1>Categoria não encontrada</h1>';
    }      
});

Route::get('/todas', function () {
    $categorias = Categoria::withTrashed()->get();
    foreach ($categorias as $c) {
        echo "id: ". $c->id . ', ';
        echo "nome: ". $c->nome ;
        if($c->trashed()){
            echo ' (apagado)<br>';
        }else{
            echo '<br>';
        }
    }
});

Route::get('/ver/{id}', function($id){ 
    $categoria = Categoria::withTrashed()->find($id); // find
    if(isset($categoria)){
        echo "id: ". $categoria->id . ', ';
        echo "nome: ". $categoria->nome . '<br>';
    }else{
        echo '<h1>Categoria não encontrada</h1>';
    }     
});

Route::get('/somenteapagadas', function () {
    $categorias = Categoria::onlyTrashed()->get();
    foreach ($categorias as $c) {
        echo "id: ". $c->id . ', ';
        echo "nome: ". $c->nome ;
        if($c->trashed()){
            echo ' (apagado)<br>';
        }else{
            echo '<br>';
        }
    }
});

Route::get('/restaurar/{id}', function($id){ 
    $categoria = Categoria::withTrashed()->find($id); // find
    if(isset($categoria)){
        $categoria->restore();
        echo "Categoria Restaurada: ". $categoria->id . '<br>';
        echo "<a href=\"/\"> Listar todas</a>";
    }else{
        echo '<h1>Categoria não encontrada</h1>';
    }     
});

Route::get('/apagarpermanente/{id}', function($id){ 
    $categoria = Categoria::withTrashed()->find($id); // find
    if(isset($categoria)){
        $categoria->forceDelete();
        echo "Categoria Restaurada: ". $categoria->id . '<br>';
        echo "<a href=\"/\"> Listar todas</a>";
        return redirect('/todas');
    }else{
        echo '<h1>Categoria não encontrada</h1>';
    }     
});

