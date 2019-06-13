@extends('layout.app',["current" =>"produtos"])

@section('body')
<div class="card border">
        <div class="card-body">
            <h5 class="card-title">Lista de Produtos</h5>
            @if (count($produtos) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>estoque</th>
                            <th>Nome da Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{$produto->id}}</td>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->preco}}</td>
                                <td>{{$produto->estoque}}</td>
                                <td>{{$produto->categoria->nome}}</td>
                                <td>
                                    <a href="/produtos/editar/{{$produto->id}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Editar</a>
                                    <a href="/produtos/apagar/{{$produto->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Apagar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            @endif
            
        </div>
        <div class="card-footer">
            <a href="/produtos/novo" class="btn btn-m btn-primary" role="button"><i class="fas fa-plus"></i> Novo Produto</a>
        </div>
    </div>
@endsection