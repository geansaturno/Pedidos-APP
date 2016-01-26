<?php
    require_once 'ConnectionFactory.php';
    require_once 'mvc/model/Produto.php';

    class ProdutoDAO{
        private $conexao;

        function __construct(){
            $this->conexao = new ConnectionFactory();
            $this->conexao = $this->conexao->criarConexao();
        }
        
        function __destruct(){
            $this->conexao->close();
        }

        public function gravar($produto){
            $statment = $this->conexao->prepare("INSERT INTO produto(nome, descricao, preco) VALUES (?,?,?)");
            $statment->bind_param("ssd", $produto->getNome(), $produto->getDescricao(), $produto->getPreco());
            $statment->execute();
        }

        public function ler($id){
            $sql = "SELECT * FROM produto WHERE id = $id";
            $result = $this->conexao->query($sql);
            
            $produto;
            
            //Verifica se possui pelo menos uma linha retornada
            if($result->num_rows > 0){
                //Se tiver pelo menos uma linha, esta linha será o produto procurado
                $result = $result->fetch_assoc();
                
                $produto = $this->produtoFactory($result);
            }
            
            return $produto;
        }
        
        public function listar(){
            $sql = "SELECT * FROM produto";
            $resultSet = $this->conexao->query($sql);
            $produtos;
            
            //Verifica se o set retornado não está vazio.
            if($resultSet->num_rows > 0){
                //Avança os resultados no set.
                for($i = 0; $i < $resultSet->num_rows; $i++){
                    $row = $resultSet->fetch_assoc();
                    $produtos[$i] = $this->produtoFactory($row);
                }
            }
            
            return $produtos;
        }
        
        public function deletar($id){
            $sql = "DELETE FROM produto WHERE id = $id";
            $this->conexao->query($sql);
            
            echo 'deletado';
        }
        
        public function alterar($produto){
            $statment = $this->conexao->prepare("UPDATE produto SET nome= ?, descricao= ?, preco = ? WHERE id = ?");
            $statment->bind_param("ssdi", $produto->getNome(), $produto->getDescricao()
                    , $produto->getPreco(), $produto->getId());
            $statment->execute();
        }


        //$row = mysqli->fetch_assoc(); 
        private function produtoFactory($row){
            $produto = new Produto();
                
            $produto->setId($row["id"]);
            $produto->setNome($row["nome"]);
            $produto->setDescricao($row["descricao"]);
            $produto->setPreco($row["preco"]);
            
            return $produto;
        }
    }
 ?>
