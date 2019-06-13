@extends('layout.app',["current" =>"categorias"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Lista de Categorias</h5>
            @if (count($categorias) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome da Categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{$categoria->id}}</td>
                                <td>{{$categoria->nome}}</td>
                                <td>
                                    <a href="/categorias/editar/{{$categoria->id}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Editar</a>
                                    <a href="/categorias/apagar/{{$categoria->id}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Apagar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            @endif
            
        </div>
        <div class="card-footer">
            <a href="/categorias/novo" class="btn btn-m btn-primary" role="button"><i class="fas fa-plus"></i> Nova Categoria</a>
        </div>
    </div>

@endsection