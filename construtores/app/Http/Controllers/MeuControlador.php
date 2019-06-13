<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller{

    public function getNome(){
        return "Elom Carvalho";
    }

    public function getIdade(){
        return "30 anos";
    }

    public function multiplicar($n1,$n2){
        return ($n1*$n2);
    }

    public function getNomeByID($id){
        $v = ["mario","Edson","Roberto","Jean"];
        if($id >=0 && $id < count($v)){
            return $v[$id];
        }
        return "não encontrado";
    }
    
}
