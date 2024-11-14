<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
?>    
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
            <a href="/index.php" class="brand-logo center">Agendador de Tarefas</a>
        </div>
    </nav>

    <div class="container">
        <h5>Cadastro</h5>
        <form id="registerForm" onsubmit="salvar()">
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

    <script>
        (function salvar() {
            ('#registerForm').on('submit', function (e) {
                e.preventDefault();
                
                const user = document.getElementById('user').value;
                const senha = document.getElementById('senha').value;

                const data = {
                    user: user,
                    senha: senha
                };


                fetch('http://localhost:8000/usuarios', {
                    method: 'POST',
                    cors: no-cors,
                    headers: {
                    
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (response.ok) {
                        M.toast({html: 'Cadastro realizado com sucesso!', classes: 'green'});
                        setTimeout(() => {
                            window.location.href = '/src/public/login.php';
                        }, 2000);
                    } else {
                        M.toast({html: 'Erro ao cadastrar o usuário. Tente novamente.', classes: 'red'});
                    }
                })
                .catch(error => {
                    M.toast({html: 'Erro ao conectar ao servidor. Tente novamente.', classes: 'red'});
                    console.error('Erro ao fazer cadastro:', error);
                });
            });
        });
    </script>
</body>
</html>
