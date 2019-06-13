<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body{ padding: 20px;}
    </style>
</head>
<body>

    <main role="main">
        <div class="row">
            <div class="container col-md-8 offset-md-2" >
                <div class="card border">
                    <div class="card-header">
                        <div class="card-title">Cadastro de Cliente</div>
                    </div>
                    <div class="card-body">
                        <form action="/cliente" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome do Cliente</label>
                                <input type="text" id="nome" class="form-control {{ $errors->has('nome')? 'is-invalid': '' }}" name="nome" placeholder="Nome do Cliente">
                                @if ($errors->has('nome'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nome') }}
                                    </div>
                                @endif
                            </div>                            
                            <div class="form-group">
                                <label for="idade">Idade do Cliente</label>
                                <input type="number" id="idade" class="form-control {{ $errors->has('idade')? 'is-invalid': '' }}" name="idade" placeholder="Idade do Cliente">
                                @if ($errors->has('idade'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('idade') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço do Cliente</label>
                                <input type="text" id="endereco" class="form-control {{ $errors->has('endereco')? 'is-invalid': '' }}" name="endereco" placeholder="Endereço do Cliente">
                                @if ($errors->has('endereco'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('endereco') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail do Cliente</label>
                                <input type="text" id="email" class="form-control {{ $errors->has('email')? 'is-invalid': '' }}" name="email" placeholder="E-mail do Cliente">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <button type="reset" class="btn btn-danger btn-sm">Cancelar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>

    @if (isset($errors))
     {{var_dump($errors)}}    
    @endif
    

    <script src="{{ URL::to('js/app.js') }}" type="text/javascript">
</body>
</html>