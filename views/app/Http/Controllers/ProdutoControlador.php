<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller{

    public function listar(){
        $produtos = [
            "Notebook Asus i7 16Gb",
            "Mouse e teclado Microsoft USB",
            "Monitor 21 - Samsung",
            "Impressora HP",
            "Disco SSD 512 GB"
        ];
        return view('produtos', compact('produtos'));
    }

    public function secaoprodutos($palavra){
        return view('sessao_produtos', compact($palavra));
    }

    public function mostraropcoes(){
        return view('mostrar_opcoes');
    }

    public function opcoes($opcao){
        return view('opcoes', compact('opcao'));                
    }
    

    public function loopForeach(){
        $produtos = [
            ["id" => 1, "nome" => "computador"],
            ["id" => 2, "nome" => "mouse"],
            ["id" => 3, "nome" => "impressora"],
            ["id" => 4, "nome" => "monitor"],
            ["id" => 5, "nome" => "teclado"],
        ];
        return view('foreach', compact('produtos'));
    }
}
