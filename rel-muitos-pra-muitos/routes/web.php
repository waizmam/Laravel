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

use App\Projeto;
use App\Desenvolvedor;
use App\Alocacao;

Route::get('/desenvolvedor_projeto', function () {
    //$desenvolvedores = Desenvolvedor::all();
    $desenvolvedores = Desenvolvedor::with('projetos')->get();
    foreach($desenvolvedores as $d) {
        echo "Nome do desenvolvedor: " . $d->nome . "<br>";
        echo "Cargo: " . $d->cargo . "<br>";
        if (count($d->projetos ) > 0) {
            echo "Projetos: <br>";
            echo "<ul>";
            foreach($d->projetos as $p) {
                echo "<li> Nome do projeto: " . $p->nome . " | ";
                echo "Horas do projeto: " . $p->estimativa_horas . " | ";
                echo "Horas trabalhadas pelo desenvolvedor: " . $p->pivot->horas_semanais . "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }
    //return $desenvolvedores->toJson();
});

Route::get('/projeto_desenvolvedores', function () {
    $projetos = Projeto::with('desenvolvedores')->get();
    foreach($projetos as $p) {
        echo "Nome do Projeto: " . $p->nome . "<br>";
        echo "Estimativa: " . $p->estimativa_horas . "<br>";
        if (count($p->desenvolvedores ) > 0) {
            echo "Desenvolvedores: <br>";
            echo "<ul>";
            foreach($p->desenvolvedores as $d) {
                echo "<li> Nome do desenvolvedor: " . $d->nome . "<br>";
                echo "Cargo: " . $d->cargo . "<br>";
                echo "Horas trabalhadas pelo desenvolvedor: " . $d->pivot->horas_semanais . "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }
    //return $projetos->toJson();
});

Route::get('/alocar', function () {
    $projeto = Projeto::find(4);
    if (isset($projeto)) {
        $projeto->desenvolvedores()->attach([
            1 =>['horas_semanais' => 50 ],
            2 => ['horas_semanais' => 150 ],
            3 => ['horas_semanais' => 200 ]
        ]);
    }
});

Route::get('/desalocar', function () {
    $projeto = Projeto::find(4);
    if (isset($projeto)) {
        //$projeto->desenvolvedores()->detach([1,2]);
        $projeto->desenvolvedores()->detach(1);
    }
});
