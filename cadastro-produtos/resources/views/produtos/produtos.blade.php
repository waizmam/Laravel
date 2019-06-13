@extends('layout.app',["current" =>"produtos"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Lista de Produtos</h5>

        <table class="table table-ordered table-hover" id="tabelaProdutos">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Nome da Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-sm btn-primary" role="button" data-toggle="modal" data-target="#dlgProdutos"><i class="fas fa-plus"></i> Novo Produto</button>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="dlgProdutos" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="formProduto">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Produto</h5>
                </div>
                <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">
                        <div class="form-group">
                            <label for="nomeProduto" class="control-label">Nome do Produto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nomeProduto" placeholder="Produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="precoProduto" class="control-label">Preço</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="precoProduto" placeholder="Preço do produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantidadeProduto" class="control-label">Quantidade</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="quantidadeProduto" placeholder="Quantidade do produto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoriaProduto" class="control-label">Categoria</label>
                            <div class="input-group">
                                <select class="form-control" id="categoriaProduto">
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript">
        // serve para que eu adicione o token apenas uma vez e aproveitá-la em todoas as minhas requisições
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':"{{ csrf_token() }}"
            }
        });

        function carregarCategorias() {
            $.getJSON('/api/categorias', function(data) {
                for (let i = 0; i < data.length; i++) {
                   opcao = '<option value="'+data[i].id+'">'+data[i].nome+'</option>';
                   $('#categoriaProduto').append(opcao);
                }
            });
        }

        function montarLinha(p) {
            linha = "<tr>"+
                "<td>" + p.id + "</td>"+
                "<td>" + p.nome + "</td>"+
                "<td>" + p.preco + "</td>"+
                "<td>" + p.estoque + "</td>"+
                "<td>" + p.categoria_id + "</td>"+
                "<td>" +
                    '<button class="btn btn-sm btn-primary" onclick="editar('+ p.id + ')"> Editar </button> ' +
                    '<button class="btn btn-sm btn-danger" onclick="apagar('+ p.id + ')"> Apagar </button> ' +
                "</td>"+
                "</tr>";
                return linha;
        }
        function carregarProdutos() {
            $.getJSON('/api/produtos', function(produtos) {
                for (let i = 0; i < produtos.length; i++) {
                    linha = montarLinha(produtos[i]);
                   $('#tabelaProdutos>tbody').append(linha);
                }
            });
        }

        function criarProduto() {
            produto = {
                nome: $('#nomeProduto').val(),
                preco: $('#precoProduto').val(),
                estoque: $('#quantidadeProduto').val(),
                categoria_id: $('#categoriaProduto').val()
            };
            $.post('/api/produtos', produto, function(result) {
                //console.log(result);
                produto = JSON.parse(result);
                linha = montarLinha(produto);
                $('#tabelaProdutos>tbody').append(linha);
            });
        }

        function updateProduto(){
            produto = {
                id: $('#id').val(),
                nome: $('#nomeProduto').val(),
                preco: $('#precoProduto').val(),
                estoque: $('#quantidadeProduto').val(),
                categoria_id: $('#categoriaProduto').val()
            };
            $.ajax({
                type:"PUT",
                url:"/api/produtos/"+ produto.id,
                context: this,
                data: produto,
                success: function(data){
                    prod = JSON.parse(data);
                    linhas = $('#tabelaProdutos>tbody>tr');
                    e = linhas.filter( function (i, elemento) {
                        return elemento.cells[0].textContent == prod.id;
                    });
                    if(e){
                        e[0].cells[0].textContent = prod.id;
                        e[0].cells[1].textContent = prod.nome;
                        e[0].cells[2].textContent = prod.preco;
                        e[0].cells[3].textContent = prod.estoque;
                        e[0].cells[4].textContent = prod.categoria_id;

                    }
                    console.log('Atualizou OK');

                },
                error: function (error) {
                    console.log(error);
                }
            })

        }

        $('#formProduto').submit(function(event) {
              event.preventDefault();
              if($('#id').val() == ''){
                criarProduto();
              }else{
                updateProduto();
              }
              $('#dlgProdutos').modal('hide');
        })

        $('#dlgProdutos').on('hide.bs.modal', function (event) {
            $('#nomeProduto').val('');
            $('#precoProduto').val('');
            $('#quantidadeProduto').val('');
            $('#categoriaProduto').val('');
        });

        function editar(idProduto){
            $.getJSON('/api/produtos/'+idProduto, function(produto) {
                $('#id').val(produto.id);
                $('#nomeProduto').val(produto.nome);
                $('#precoProduto').val(produto.preco);
                $('#quantidadeProduto').val(produto.estoque);
                $('#categoriaProduto').val(produto.categoria_id);
                $('#dlgProdutos').modal('show');
            });
        }

        function apagar(idProduto){
            $.ajax({
                type:"DELETE",
                url:"/api/produtos/"+idProduto,
                context: this,
                success: function () {
                    console.log('Apagou OK');
                    linhas = $('#tabelaProdutos>tbody>tr');
                    e = linhas.filter( function (i, elemento) {
                        return elemento.cells[0].textContent == idProduto;
                    });
                    if(e){
                        e.remove();
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            })
        }

        $(function(){
            carregarCategorias();
            carregarProdutos();
        })
    </script>
@endsection
