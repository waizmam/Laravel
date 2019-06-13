<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meu titulo - @yield('titulo')</title>
</head>
<body>
    @section('barraLateral')        
        <p>Esta parte da sessão é template PAI</p>                
    @show  <!-- o show é diferente do endsection  -->    

    <div>
        <!-- função que diz para o laravel qual é a sessão que ele deve mostrar que no caso é 'conteúdo',
            e essa sessão vai ficar exatamente onde está definido neste local
        -->
        @yield('conteudo')
    </div>
</body>
</html>