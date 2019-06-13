<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
        <title>Paginação</title>
        <style>
            body{
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">

            <div class="card text-center">
                <div class="card-header">Tabela de clientes</div>
                <div class="cardbody">
                    <h5>Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} ({{ $clientes->firstitem() }} a {{ $clientes->lastItem() }})</h5>
                    <table class="table table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col">E-mail</th>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->id }}</td>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->sobrenome }}</td>
                                    <td>{{ $cliente->email }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $clientes->links() }}
                </div>
            </div>

        </div>
        <?php
            /*echo '<pre>';
            var_dump($clientes);
            echo '</pre>';*/
        ?>
        <script src="{{ URL::to('js/app.js') }}" type="text/javascript" ></script>
    </body>
</html>
