<?php 
    
    $classe = $_GET['model'];
    $metodo = $_GET['action'];
    
    if($classe == NULL){
        $classe = "Pedido";
    }
    
    if($metodo == NULL){
        $metodo = "listar";
    }
    
    $classe .= "Controller";
    
    require_once 'mvc/controller/' . $classe . '.php';
    
    $modelOBJ = new $classe();
    $modelOBJ->$metodo();

?>