<html>
    <body>
        <h4>Seja bem vindo(a), {{ $nome }}</h4>
        <p>Você acabou de acessar o sistema utilizandos eu email: {{ $email }}</p>
        <p>Data / hora de acesso: {{ $datahora }}</p>
        <p>Clique no link abaixo para confirmar seu email de registro:</p>
        <a href="{{ $link }}"> CLIQUE AQUI</a>
    </body>
</html>
