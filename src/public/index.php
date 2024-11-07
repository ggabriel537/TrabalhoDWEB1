<?php
require_once 'src/Router.php';
require_once 'src/BancoDados/Controllers/TarefaC.php';
require_once 'src/BancoDados/Controllers/UsuarioC.php';
require_once 'src/BancoDados/Config/db.php';

$router = new Router();

$tarefac = new TarefaC();
$usuarioc = new UsuarioC();

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


