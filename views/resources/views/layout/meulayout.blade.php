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
    <!-- só vai mostrar o card se o layout filho tem definido uma sessão -->
    @hasSection ('minha_secao_produtos')  
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="width: 500; margin:10px">Produtos</h5>
                <p class="card-text">
                    @yield('minha_secao_produtos')
                </p>
                <a href="#" class="card-link">Informações</a>
                <a href="#" class="card-link">Ajuda</a>
            </div>
        </div>        
    @endif
    
    

    <script src="{{ URL::to('js/app.js') }}" type="text/javascript">
</body>
</html>