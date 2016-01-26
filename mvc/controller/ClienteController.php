<?php

/**
 * Controlador responsável pelos pedidos
 *
 * @author cronosnaeg
 */
require_once 'mvc/model/dao/ClienteDAO.php';

class ClienteController {
    private $dir = "mvc/view/clientes";
    private $clienteDAO;

    function __construct() {
        $this->clienteDAO = new ClienteDAO();
    }

    function listar() {
        $clientes = $this->clienteDAO->listar();
        $_REQUEST['clientes'] = $clientes;
        $_REQUEST['body'] = "$this->dir/listaClientes";

        require_once 'template.php';
    }

    function novo() {
        
        $_REQUEST['body'] = "$this->dir/novoCliente";
        require_once 'template.php';
    }

    function salvar() {
        require_once 'mvc/model/Cliente.php';
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        
        $cliente = new Cliente($nome, $email, $telefone);
        
        $this->clienteDAO->gravar($cliente);
        
        header("Location: index.php?model=Cliente&action=listar");
        
    }

    function deletar() {
        
        $id = $_GET['id'];
        
        $this->clienteDAO->deletar($id);
        
        header("Location: index.php?model=Cliente&action=listar");
        
    }
    

    function alterar() {
        
        $id = $_GET['id'];
        
        $cliente = $this->clienteDAO->ler($id);
        
        $_REQUEST['cliente'] = $cliente;
        $_REQUEST['body'] = "$this->dir/alterarCliente";
        
        require_once 'template.php';
        
    }

    function salvarAlteracoes(){
        
        $id = $_POST['id'];
        
        $cliente = $this->clienteDAO->ler($id);
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        
        $cliente->setNome($nome);
        $cliente->setEmail($email);
        $cliente->setTelefone($telefone);
        
        $this->clienteDAO->alterar($cliente);
        
        header("Location: index.php?model=Cliente&action=listar");
    }
    
    function exibir() {
        $id = $_REQUEST['id'];
        $cliente = $this->clienteDAO->ler($id);
        
        $_REQUEST['cliente'] = $cliente;
        $_REQUEST['body'] = "$this->dir/exibirCliente";
        
        require_once 'template.php';
    }

}
