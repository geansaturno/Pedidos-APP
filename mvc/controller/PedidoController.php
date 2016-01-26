<?php

/**
 * Controlador responsável pelos pedidos
 *
 * @author cronosnaeg
 */
require_once 'mvc/model/dao/PedidoDAO.php';

class PedidoController {
    private $dir = "mvc/view/pedidos";
    private $pedidoDAO;
    
    function __construct() {
        $this->pedidoDAO = new PedidoDAO();
    }
    
    function listar(){
        require_once 'mvc/model/dao/ClienteDAO.php';
        require_once 'mvc/model/dao/ProdutoDAO.php';
        
        $clienteDAO = new ClienteDAO();
        $produtoDAO = new ProdutoDAO();
        
        $clientes = $clienteDAO->listar();
        $produtos = $produtoDAO->listar();
        $pedidos = $this->pedidoDAO->listar();
        
        $_REQUEST['pedidos'] = $pedidos;
        $_REQUEST['produtos'] = $produtos;
        $_REQUEST['clientes'] = $clientes;
        
        $_REQUEST['body'] = "$this->dir/listaPedidos";
        
        require_once 'template.php';
    }
    
    function salvar(){
        
        require_once 'mvc/model/Pedido.php';
        require_once 'mvc/model/dao/ClienteDAO.php';
        require_once 'mvc/model/dao/ProdutoDAO.php';
        
        $produtoId = $_POST['produtoId'];
        $clienteId = $_POST['clienteId'];
        
        $produtoDAO = new ProdutoDAO();
        $clienteDAO = new ClienteDAO();
        
        $pedido = new Pedido();
        $pedido->setCliente($clienteDAO->ler($clienteId));
        $pedido->setProduto($produtoDAO->ler($produtoId));
        
        $this->pedidoDAO->gravar($pedido);
        
        $this->listar();
    }
    
    function deletar(){
        
        $cid = $_GET['cid'];
        $pid = $_GET['pid'];
        
        $this->pedidoDAO->deletar($cid, $pid);
        
        header("Location: index.php?model=Pedido&action=listar");
        
    }
    
    function exibir(){
        $clienteId = $_REQUEST['cid'];
        $produtoId = $_REQUEST['pid'];
        $pedido = $this->pedidoDAO->ler($produtoId, $clienteId);
        
        $_REQUEST['pedido'] = $pedido;
        $_REQUEST['body'] = "$this->dir/exibirPedido"; 
        
        require_once 'template.php';
    }
}
