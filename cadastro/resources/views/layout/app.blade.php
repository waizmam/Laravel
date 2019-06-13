<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body{
            padding: 20px;
        }
        .navbar{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        @component('components.component_navbar',["current" => $current])            
        @endcomponent
        <main role="main">
            @hasSection ('body')
                @yield('body')
            @endif
        </main>
    </div>
    
    <script src="{{ URL::to('js/app.js') }}" type="text/javascript">
</body>
</html>