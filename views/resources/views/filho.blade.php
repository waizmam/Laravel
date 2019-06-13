<!-- herdando/extendendo o layout.app ou layout/app -->
@extends('layout.app')

<!-- inserindo o valor na sessão titulo que foi definida no meu layout.app -->
@section('titulo', 'Minha Página - Filho')

@section('barraLateral')
@parent <!-- mostra o conteúdo pai-->
    <p>Essa parte é do FILHO</p>
@endsection

<!-- Section -->
@section('conteudo')
    <p>Este é o conteúdo do FILHO</p>
@endsection

