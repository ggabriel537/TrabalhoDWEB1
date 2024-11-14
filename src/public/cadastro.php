<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Agendador de Tarefas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <nav>
        <div class="nav-wrapper blue">
            <a href="#" class="brand-logo center">Agendador de Tarefas</a>
            <ul id="nav-mobile" class="right">
                <li>
                    <a href="/src/public/login.php">Login</a>
                </li>
                <li>
                    <a href="src/public/cadastro.php">Cadastro</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h5>Cadastro</h5>
        <form action="/src/public/cadastrar.php" method="POST">
            <div class="input-field">
                <input id="user" type="text" name="user" required>
                <label for="user">Nome de Usuário</label>
            </div>

            <div class="input-field">
                <input id="senha" type="password" name="senha" required>
                <label for="senha">Senha</label>
            </div>

            <div class="input-field" style="margin-top: 20px;">
                <button class="btn blue" type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>
