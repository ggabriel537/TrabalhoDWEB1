<?php //Configs banco de dados
$host = 'localhost';
$db = 'BancoDados';
$user = 'root';
$pass = 'r5x9EA93yuS4EeP';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>