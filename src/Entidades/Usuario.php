<?php
    class Usuario{

        private $user;
        private $senha;

        function __construct($user, $senha)
        {
            $this->user = $user;
            $this->senha = $senha;
        }

        public function getUser() {
            return $this->user;
        }
    
        public function setUser($user) {
            $this->user = $user;
        }
    
        public function getSenha() {
            return $this->senha;
        }
    
        public function setSenha($senha) {
            $this->senha = $senha;
        }
    }
?>