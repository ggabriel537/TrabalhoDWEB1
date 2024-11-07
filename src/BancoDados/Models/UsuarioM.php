<?php
include_once 'src/BancoDados/Config/db.php';
include_once 'src/Entidades/Usuario.php';

class UsuarioM {
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function salvar($usuario)
    {
        $sql = "INSERT INTO usuarios (user, senha) VALUES (:user, :senha)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user', $usuario->getUser());
        $stmt->bindParam(':senha', $usuario->getSenha());
        return $stmt->execute();
    }

    public function retornarUsuarios()
    {
        $sql = "SELECT user FROM usuarios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function retornarUsuario($usuario)
    {
        $sql = "SELECT * FROM usuarios WHERE user = :user";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user', $usuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($usuario)
    {
        $sql = "UPDATE usuarios SET user = :user, senha = :senha WHERE user = :user";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user', $usuario->getUser());
        $stmt->bindParam(':senha', $usuario->getSenha());
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deletar($usuario)
    {
        $sql = "DELETE FROM usuarios WHERE user = :user";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user', $usuario);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>
