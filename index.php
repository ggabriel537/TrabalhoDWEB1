<?php
require_once 'src/Router.php';
require_once 'src/BancoDados/Controllers/TarefaC.php';
require_once 'src/BancoDados/Controllers/UsuarioC.php';
require_once 'src/BancoDados/Config/db.php';

$router = new Router();

$tarefac = new TarefaC($db);
$usuarioc = new UsuarioC($db);

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
$requestedPath = "/" . $pathItems[3] . ($pathItems[4] ? "/" . $pathItems[4] : "");

$router->dispatch($requestedPath);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendador de Tarefas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

    <div class="container">
        <h1>Agendador de Tarefas</h1>
        <p>Um pequeno sistema para agendar e lembrar de tarefas a serem entregues.</p>

        <h2>Tecnologias utilizadas</h2>
        <ul>
            <li>- PHP</li>
            <li>- Composer</li>
            <li>- PostgreSQL</li>
            <li>- Materialize</li>
        </ul>

        <h2>Público alvo</h2>
        <p>Qualquer um que esteja procurando um sistema simples para se lembrar de tarefas a serem realizadas.</p>

        <h2>Diagrama do banco de dados</h2>
        <img src="https://github.com/ggabriel537/TrabalhoDWEB1/blob/main/DiagramaBanco.png?raw=true" alt="Diagrama do Banco de Dados" style="max-width: 100%; height: auto;">

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>