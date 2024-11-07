<?php
include_once 'src/BancoDados/Config/db.php';
include_once 'src/Entidades/Tarefa.php';
    class TarefaM{
        private $conn;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function salvar($tarefa)
        {
            $sql = "INSERT INTO tarefas (nome, user_id, descricao, prazo, notificar) 
                    VALUES (:nome, :user_id, :descricao, :prazo, :notificar)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $tarefa->getNome());
            $stmt->bindParam(':user_id', $tarefa->getUserId());
            $stmt->bindParam(':descricao', $tarefa->getDescricao());
            $stmt->bindParam(':prazo', $tarefa->getPrazo());
            $stmt->bindParam(':notificar', $tarefa->getNotificar());
            return $stmt->execute();
        }

        public function retornarTarefas($user)
        {
            $sql = "SELECT id, nome, user_id, descricao, prazo, notificar FROM tarefas WHERE user_id = :user_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user_id', $user);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function retornarTarefa($tarefa)
        {
            $sql = "SELECT * FROM tarefas WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $tarefa);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function atualizar($tarefa)
        {
            $sql = "UPDATE tarefas SET nome = :nome, descricao = :descricao, prazo = :prazo, notificar = :notificar 
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $tarefa->getId());
            $stmt->bindParam(':nome', $tarefa->getNome());
            $stmt->bindParam(':descricao', $tarefa->getDescricao());
            $stmt->bindParam(':prazo', $tarefa->getPrazo());
            $stmt->bindParam(':notificar', $tarefa->getNotificar());
            $stmt->execute();
            return $stmt->rowCount();
        }

        public function deletar($tarefa)
        {
            $sql = "DELETE FROM tarefas WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $tarefa->getId());
            $stmt->execute();
            return $stmt->rowCount();
        }
    }
?>