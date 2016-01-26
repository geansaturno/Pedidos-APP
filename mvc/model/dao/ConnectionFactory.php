<?php

class ConnectionFactory{
    private $server = "localhost";
    private $database = "abrildb";
    private $user = "abril";
    private $pwd = "abril*";


    public function criarConexaoPDO(){
        return new PDO("mysql:host=$this->server;dbname=$this->database", $this->user, $this->pwd);
    }

    public function criarConexaoMySQLi(){
        return mysqli_connect("$this->server/$this->database", $this->user, $this->pwd);
    }

    public function criarConexao(){
        return new mysqli($this->server, $this->user, $this->pwd, $this->database);
    }
}
