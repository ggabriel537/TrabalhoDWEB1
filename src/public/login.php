<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Agendador de Tarefas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body class="blue lighten-5">
    <nav>
        <div class="nav-wrapper blue">
            <a href="/index.php" class="brand-logo center">Agendador de Tarefas</a>
        </div>
    </nav>
    <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card">
                <div class="card-content">
                    <span class="card-title center">Login</span>
                    <form id="loginForm">
                        <div class="input-field">
                            <input id="user" type="text" required>
                            <label for="user">Usuário</label>
                        </div>
                        <div class="input-field">
                            <input id="senha" type="password" required>
                            <label for="senha">Senha</label>
                        </div>
                        <div class="center">
                            <button class="btn blue waves-effect waves-light" type="submit">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    async function requisicao(usuario, senha) {
        try {
            let resposta = await fetch(`http://localhost:8000/usuarios/${user}`, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json"
                }
            });

            if (!resposta.ok) {
                throw new Error('Usuário não encontrado');
            }

            let dados = await resposta.json();

            if (dados.senha === senha) {
                alert('Login bem-sucedido');
            } else {
                alert('Senha ou usuario incorreto');
            }

        } catch (error) {
            alert(error);
            alert('Erro ao tentar fazer login');
        }
    }

    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const usuario = document.getElementById('user').val;
        const senha = document.getElementById('senha').val;
        requisicao(usuario, senha);
    });
</script>
</html>
