@extends('layout.app',["current" =>"categorias"])

@section('body')
    <div class="card border">
        <div class="card-body">
        <form action="/categorias/{{$categoria->id}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome da Categoria</label>
                <input type="text" class="form-control" name="nomeCategoria" id="nomeCategoria" placeholder="Categoria" value="{{$categoria->nome}}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="reset" class="btn btn-danger btn-sm">Cancel</button>
                
            </form>
        </div>
    </div>
@endsection