<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--<link rel="stylesheet" href="{{ asset('css/app.css') }}">-->
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
</head>
<body>
        <!-- Criamos dentro AppServiceProvider um apelido para o component (app/provider/AppServiceProvider) -->
        @alerta(['tipo'=>'warning','titulo' =>'Erro Fatal'])           
        <strong>Erro: </strong> Sua mensagem de erro.            
        @endalerta

        @alerta(['tipo'=>'danger','titulo' =>'Erro Fatal'])           
        <strong>Erro: </strong> Sua mensagem de erro.            
        @endalerta

        @alerta(['tipo'=>'info','titulo' =>'Erro Fatal'])           
        <strong>Erro: </strong> Sua mensagem de erro.            
        @endalerta

        <!-- Chamando o component diretamente pelo Blade passando parâmetros -->
        @component('components.meucomponente',['tipo'=>'warning','titulo' =>'Erro Fatal'])           
            <strong>Erro: </strong> Sua mensagem de erro.            
        @endcomponent



        <!--<script src="{{ asset('js/app.js') }}" type="text/javascript">-->
        <script src="{{ URL::to('js/app.js') }}" type="text/javascript">
</body>
</html>