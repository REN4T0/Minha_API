<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafezin com leite e pão de queijo</title>
</head>
<body>

    <h1>Autenticação da API</h1>
    <!-- Formulário de login -->

    <form id="loginForm">

        <label for="username">Usuário</label><br>
        <input type="text" id="username" name="username"><br><br>

        <label for="password">Senha</label><br>
        <input type="password" name="password" id="password"><br><br>

        <button type="submit">Consultar</button>

    </form>


    <!-- DIV com resultado da consulta da API -->
    <div id="response">

        <h1>Resposta da consulta</h1>
        <pre class="response"></pre>

    </div>


    <script src="js/script.js"></script>
    
</body>
</html>