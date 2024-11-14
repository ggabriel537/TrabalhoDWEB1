<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preencher Tarefa - Agendador de Tarefas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <nav>
        <div class="nav-wrapper blue">
            <a href="/index.php" class="brand-logo center">Agendador de Tarefas</a>
            <ul id="nav-mobile" class="right">
                <li><a href="/src/public/login.php" class="modal-trigger">Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h5>Preencher Tarefa</h5>
        <form action="/tarefa/criar" method="POST">
            <div class="input-field">
                <input id="nome" type="text" name="nome" required>
                <label for="nome">Nome da Tarefa</label>
            </div>

            <div class="input-field">
                <textarea id="descricao" class="materialize-textarea" name="descricao" maxlength="250" required></textarea>
                <label for="descricao">Descrição</label>
            </div>

            <div class="input-field">
                <input id="prazo" type="text" class="datepicker" name="prazo" required>
                <label for="prazo">Prazo</label>
            </div>

            <div class="input-field">
                <label>
                    <input type="checkbox" name="notificar" />
                    <span>Notificar sobre a tarefa?</span>
                </label>
            </div>

            <div class="input-field" style="margin-top: 80px;">
                <button class="btn blue" type="submit">Salvar Tarefa</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoClose: true
            });
        });
    </script>
</body>
</html>
