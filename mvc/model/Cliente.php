<?php

    class Cliente{
        private $id;
        private $nome;
        private $email;
        private $telefone;
        
        function __contructEmpty(){
            
        }
        
        function __construct($nome, $email, $telefone) {
            $this->nome = $nome;
            $this->email = $email;
            $this->telefone = $telefone;
        }

        function getId() {
            return $this->id;
        }

        function getNome() {
            return $this->nome;
        }

        function getEmail() {
            return $this->email;
        }

        function getTelefone() {
            return $this->telefone;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
        
        function toString(){
            return "$this->nome - id: $this->id";
        }
    }
 ?>
