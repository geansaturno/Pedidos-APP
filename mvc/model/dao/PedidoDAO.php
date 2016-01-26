<?php
    require_once 'ConnectionFactory.php';
    require_once 'ProdutoDAO.php';
    require_once 'ClienteDAO.php';
    require_once 'mvc/model/Pedido.php';
    

    class PedidoDAO{
        private $conexao;

        function __construct(){
            $this->conexao = new ConnectionFactory();
            $this->conexao = $this->conexao->criarConexao();
        }
        
        function __destruct(){
            $this->conexao->close();
        }

        public function gravar($pedido){
            $statment = $this->conexao->prepare("INSERT INTO pedido(produto_id, cliente_id) VALUES (?,?)");
            $statment->bind_param("ii", $pedido->getProduto()->getId(), $pedido->getCliente()->getId());
            $statment->execute();
        }

        public function ler($produtoId, $clienteId){
            $sql = "SELECT * FROM pedido WHERE cliente_id = $clienteId AND produto_id = $produtoId";
            $result = $this->conexao->query($sql);
            
            $pedido;
            
            //Verifica se possui pelo menos uma linha retornada
            if($result->num_rows > 0){
                //Se tiver pelo menos uma linha, esta linha será o produto procurado
                $result = $result->fetch_assoc();
                
                $pedido = $this->pedidoFactory($result);
            }
            
            return $pedido;
        }
        
        public function listar(){
            $sql = "SELECT * FROM pedido";
            $resultSet = $this->conexao->query($sql);
            $pedido;
            
            //Verifica se o set retornado não está vazio.
            if($resultSet->num_rows > 0){
                //Avança os resultados no set.
                for($i = 0; $i < $resultSet->num_rows; $i++){
                    $row = $resultSet->fetch_assoc();
                    $pedido[$i] = $this->pedidoFactory($row);
                }
            }
            
            return $pedido;
        }
        
        public function deletar($clienteId, $produtoId){
            $sql = "DELETE FROM pedido WHERE cliente_id = $clienteId AND produto_id = $produtoId";
            $this->conexao->query($sql);
        }


        //$row = mysqli->fetch_assoc(); 
        private function pedidoFactory($row){
            $produtoDAO = new ProdutoDAO();
            $clienteDAO = new ClienteDAO();
            
            $produto = $produtoDAO->ler($row["produto_id"]);
            $cliente = $clienteDAO->ler($row["cliente_id"]);
            
            $pedido = new Pedido();
                
            $pedido->setCliente($cliente);
            $pedido->setProduto($produto);
            
            return $pedido;
        }
    }
 ?>
