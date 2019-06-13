<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

use Illuminate\Support\Facades\Cache;

class ProdutosController extends Controller
{
    function index(){
        $expiracao = 1; // minutos para expirar
        $produtos = Cache::remember('todososprodutos', $expiracao, function() {
            info('passei por aqui');
            return Produto::with('categorias')->get();
        });

        return view('produtos',compact(['produtos']));
    }
}
