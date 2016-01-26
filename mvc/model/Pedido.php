<?php

class Pedido {
    private $produto;
    private $cliente;
    
    function getProduto() {
        return $this->produto;
    }

    function getCliente() {
        return $this->cliente;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function toString(){
        return "prod: " . $this->produto->getNome() . " - cli: " . $this->cliente->getNome();
    }
}