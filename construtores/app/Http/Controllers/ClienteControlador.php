<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lista de todos os clientes - Raiz   
        return "Lista de todos os clientes - Raiz";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //Formulário para cadastrar novo Cliente
        return "Formulário para cadastrar novo Cliente";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Quando for salvar alguma coisa no banco vindo de um formulário cadastro de um novo produto/cliente
    public function store(Request $request)
    {
        $s = "Armazenar: ";
        $s .= "Nome: ". $request->input('nome'). " e ";
        $s .= "Idade: ". $request->input('idade');
        return response($s, 201) ; // o código 201 é para informar que foi criado alguma coisa
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // Mostra as informações do cliente  pelo ID
        $v = ["mario","Edson","Roberto","Jean"];
        if($id >=0 && $id < count($v)){
            return $v[$id];
        }
        return "não encontrado";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Formulário para editar Cliente com ID
        return "Formulário para editar Cliente com ID ". $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Quando for salvar alguma coisa no banco vindo de um formulário de alteração de cliente/produto
    //Precisa informar _method PUT/PATCH para que o laravel possa utilziar os métodos HTTP Correto
    public function update(Request $request, $id)
    {
        $s = "Atualizar Cliente com id $id: ";
        $s .= "Nome: ". $request->input('nome'). " e ";
        $s .= "Idade: ". $request->input('idade');
        return response($s, 200) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ///Apagar Cliente por ID
        return response("Apagado Cliente com ID ". $id,200);
    }

    public function requisitar(Request $request){
        echo "nome: ". $request->input('nome');
    }
}
