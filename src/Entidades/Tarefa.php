<?php
    class Tarefa{

        private $id;
        private $nome;
        private $user_id;
        private $descricao;
        private $prazo;
        private $notificar;

        function __construct($user, $senha)
        {
            $this->user = $user;
            $this->senha = $senha;
        }

        public function getId() {
            return $this->id;
        }
    
        public function setId($id) {
            $this->id = $id;
        }
    
        public function getNome() {
            return $this->nome;
        }
    
        public function setNome($nome) {
            $this->nome = $nome;
        }
    
        public function getUserId() {
            return $this->user_id;
        }
    
        public function setUserId($user_id) {
            $this->user_id = $user_id;
        }
    
        public function getDescricao() {
            return $this->descricao;
        }
    
        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }
    
        public function getPrazo() {
            return $this->prazo;
        }
    
        public function setPrazo($prazo) {
            $this->prazo = $prazo;
        }
    
        public function getNotificar() {
            return $this->notificar;
        }
    
        public function setNotificar($notificar) {
            $this->notificar = $notificar;
        }
    }
?>