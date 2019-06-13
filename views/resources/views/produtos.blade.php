<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
</head>
<body>
    
    @if (isset($produtos))

        @if (count($produtos) == 0)
            @alerta(['tipo'=>'warning','titulo' =>'Nunhum Produto'])           
            @endalerta
        @elseif (count($produtos) === 1)
            @alerta(['tipo'=>'info','titulo' =>'Temos 1 Produtos'])           
            @endalerta
        @else
            @alerta(['tipo'=>'success','titulo' =>'Temos vários Produtos'])           
            @endalerta
        @endif

        @foreach ($produtos as $p)
            <p>Nome: {{$p}}</p>
        @endforeach
        
    @else 
        @alerta(['tipo'=>'danger','titulo' =>'Variável produtos não foi passada como parâmetro.'])           
        @endalerta
    @endif

    @empty($produtos)
        @alerta(['tipo'=>'dark','titulo' =>'Nada em Produtos'])           
        @endalerta
    @endempty

    <script src="{{ URL::to('js/app.js') }}" type="text/javascript">
</body>
</html>