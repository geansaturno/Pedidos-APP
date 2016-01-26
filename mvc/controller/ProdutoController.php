<?php

/**
 * Controlador responsável pelos pedidos
 *
 * @author cronosnaeg
 */

require_once 'mvc/model/dao/PedidoDAO.php';

class ProdutoController {
    private $dir = "mvc/view/produtos";
    private $produtoDAO;
    
    function __construct() {
        $this->produtoDAO = new ProdutoDAO();
    }
    
    function listar(){
        $produtos = $this->produtoDAO->listar();
        $_REQUEST['produtos'] = $produtos;
        $_REQUEST['body'] = "$this->dir/listaProdutos";
        
        require_once 'template.php';
    }
    
    function novo(){
        $_REQUEST['body'] = "$this->dir/novoProduto";
        
        require_once 'template.php';
    }
    
    function salvar(){
        require_once 'mvc/model/Produto.php';
        
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];
        
        $produto = new Produto($nome, $descricao, $preco);
        
        $this->produtoDAO->gravar($produto);
        
        header("Location: index.php?model=Produto&action=listar");
    }
    
    function deletar(){
        
        $id = $_GET['id'];
        
        $this->produtoDAO->deletar($id);
        
        header("Location: index.php?model=Produto&action=listar");
    }
    
    function alterar(){
        $id = $_GET['id'];
        
        $produto = $this->produtoDAO->ler($id);
        
        $_REQUEST['produto'] = $produto;
        $_REQUEST['body'] = "$this->dir/alterarProduto";
        
        require_once 'template.php';
    }
    
    function salvarAlteracoes(){
        
        $id = $_POST['id'];
        
        $produto = $this->produtoDAO->ler($id);
        
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        
        $produto->setNome($nome);
        $produto->setDescricao($descricao);
        $produto->setPreco($preco);
        
        $this->produtoDAO->alterar($produto);
        
        header("Location: index.php?model=Produto&action=listar");
    }
    
    function exibir(){
        $id = $_REQUEST['id'];
        $produto = $this->produtoDAO->ler($id);
        
        $_REQUEST['produto'] = $produto;
        $_REQUEST['body'] = "$this->dir/exibirProduto";
        
        require_once 'template.php';
    }
}
