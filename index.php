<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas - Agendador de Tarefas</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <nav>
        <div class="nav-wrapper blue">
            <a href="#" class="brand-logo center">Agendador de Tarefas</a>
            <ul id="nav-mobile" class="right">
                <li><a href="/src/public/login.php">Login</a></li>
                <li><a href="/src/public/cadastro.php">Cadastro</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h5>Tarefas</h5>
        <button class="btn blue" id="addTaskBtn">Adicionar Tarefa</button>
        <ul class="collection">
            <li class="collection-item">
                <div class="row">
                    <div class="col s10">
                        <a href="/tarefa/1">Tarefa 1</a>
                        <span class="secondary-content">12/12/2024</span>
                    </div>
                    <div class="col s2 right-align">
                        <a href="/src/public/deletar_tarefa.php?id=1" class="btn red btn-small" title="Deletar Tarefa">
                            <i class="material-icons">Deletar</i>
                        </a>
                    </div>
                </div>
            </li>
            <li class="collection-item">
                <div class="row">
                    <div class="col s10">
                        <a href="/tarefa/2">Tarefa 2</a>
                        <span class="secondary-content">15/12/2024</span>
                    </div>
                    <div class="col s2 right-align">
                        <a href="/src/public/deletar_tarefa.php?id=2" class="btn red btn-small" title="Deletar Tarefa">
                            <i class="material-icons">Deletar</i>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <script>
        $(document).ready(function() {
            $('#addTaskBtn').click(function() {
                window.location.href = '/src/public/edicaotarefa.php';
            });
        });
    </script>
</body>
</html>
