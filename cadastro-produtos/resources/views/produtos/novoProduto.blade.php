@extends('layout.app',["current" =>"produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/produtos" method="post">
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto">
                </div>
                <div class="form-group">
                    <label for="precoProduto">Preço</label>
                    <input type="text" class="form-control" name="precoProduto" id="precoProduto" placeholder="Preço">
                </div>
                <div class="form-group">
                        <label for="estoqueProduto">Estoque</label>
                        <input type="number" class="form-control" name="estoqueProduto" id="estoqueProduto" placeholder="Estoque">
                </div>
                <div class="form-group">
                    <label for="categoriaProduto">Example select</label>
                    <select name="categoriaProduto" class="form-control" id="categoriaProduto">
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="reset" class="btn btn-danger btn-sm">Cancel</button>
                
            </form>
        </div>
    </div>
@endsection