<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class UsuarioController extends Controller
{

    public function __construct(){
        //$this->middleware('primeiro');
    }

    public function index(){
        Log::debug('UsuarioController@index');
        return '<h3>Lista de Usuários</h3>'.
                '<ul>'.
                '<li>Elom Waizmam</li>'.
                '<li>Manoel Ruis</li>'.
                '<li>Antônio loyola</li>'.
                '<li>Janderson Dias</li>'.
                '<ul>';
    }
}
