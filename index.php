<?php
require_once 'src/Router.php';
require_once 'src/BancoDados/Controllers/TarefaC.php';
require_once 'src/BancoDados/Controllers/UsuarioC.php';
require_once 'src/BancoDados/Config/db.php';

$router = new Router(); 

//Inicia as classes de controllers
$tarefac = new TarefaC($db);
$usuarioc = new UsuarioC($db);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

//Rotas do router
$router->add('GET', '/tarefas', [$tarefac, 'listarTarefas']);
$router->add('GET', '/tarefas/{id}', [$tarefac, 'listarTarefa']);
$router->add('POST', '/tarefas', [$tarefac, 'criar']);
$router->add('DELETE', '/tarefas/{id}', [$tarefac, 'deletar']);
$router->add('PUT', '/tarefas/{id}', [$tarefac, 'atualizar']);

$router->add('GET', '/usuarios', [$usuarioc, 'listarUsuarios']);
$router->add('GET', '/usuarios/{user}', [$usuarioc, 'listarUsuario']);
$router->add('POST', '/usuarios', [$usuarioc, 'criar']);
$router->add('DELETE', '/usuarios/{user}', [$usuarioc, 'deletar']);
$router->add('PUT', '/usuarios/{user}', [$usuarioc, 'atualizar']);


$requestedPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$pathItems = explode("/", $requestedPath);
$requestedPath = implode("/", $pathItems);;
$router->dispatch(requestedPath: $requestedPath);
?>

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
