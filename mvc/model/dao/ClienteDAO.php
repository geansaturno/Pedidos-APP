<?php
    require_once 'ConnectionFactory.php';
    require_once 'mvc/model/Cliente.php';

    class ClienteDAO{
        private $conexao;

        function __construct(){
            $this->conexao = new ConnectionFactory();
            $this->conexao = $this->conexao->criarConexao();
        }
        
        function __destruct(){
            $this->conexao->close();
        }

        public function gravar($cliente){
            $statment = $this->conexao->prepare("INSERT INTO cliente(nome, email, telefone) VALUES (?,?,?)");
            $statment->bind_param("sss", $cliente->getNome(), $cliente->getEmail(), $cliente->getTelefone());
            $statment->execute();
        }

        public function ler($id){
            $sql = "SELECT * FROM cliente WHERE id = $id";
            $result = $this->conexao->query($sql);
            
            $cliente;
            
            //Verifica se possui pelo menos uma linha retornada
            if($result->num_rows > 0){
                //Se tiver pelo menos uma linha, esta linha será o produto procurado
                $result = $result->fetch_assoc();
                
                $cliente = $this->clienteFactory($result);
            }
            
            return $cliente;
        }
        
        public function listar(){
            $sql = "SELECT * FROM cliente";
            $resultSet = $this->conexao->query($sql);
            $clientes;
            
            //Verifica se o set retornado não está vazio.
            if($resultSet->num_rows > 0){
                //Avança os resultados no set.
                for($i = 0; $i < $resultSet->num_rows; $i++){
                    $row = $resultSet->fetch_assoc();
                    $clientes[$i] = $this->clienteFactory($row);
                }
            }
            
            return $clientes;
        }
        
        public function deletar($id){
            $sql = "DELETE FROM cliente WHERE id = $id";
            $this->conexao->query($sql);
        }
        
        public function alterar($cliente){
            $statment = $this->conexao->prepare("UPDATE cliente SET nome= ?, email= ?, telefone = ? WHERE id = ?");
            $statment->bind_param("ssdi", $cliente->getNome(), $cliente->getEmail()
                    , $cliente->getTelefone(), $cliente->getId());
            $statment->execute();
        }


        //$row = mysqli->fetch_assoc(); 
        private function clienteFactory($row){
            $cliente = new Cliente();
                
            $cliente->setId($row["id"]);
            $cliente->setNome($row["nome"]);
            $cliente->setEmail($row["email"]);
            $cliente->setTelefone($row["telefone"]);
            
            return $cliente;
        }
    }
 ?>
