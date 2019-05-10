<?php

include_once "Conexao.php";

include_once "../model/Cliente.php";

/**
 * Description of ClientePDO
 *
 * @author feijo
 */
 class ClientePDO extends Conexao {
    private $conn;
    
    function __construct() {
        $this->conn = parent::getConnect();
    }
    public function insert(){
        
    }
    function select() {
        $stmt = $this->conn->prepare("SELECT * FROM clientes");
        if($stmt->execute()){
            $clientes = Array();
            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                array_push($clientes, $this->resultSetProduto($rs));
            }
        }
        return $$clientes;
    }
    public function update($produto){
        
    }
    
    public function delete($produto){
        
    }
    
    private function resultSetProduto($rs){
        $cliente = new Cliente;
        $cliente->getId_cliente($rs->id_cliente);
        $cliente->getNome($rs->nome);
        $cliente->getPedido($rs->pedido);
        $cliente->getSituacao($rs->situacao);
        $cliente->getSobrenome($rs->sobrenome);
        return $cliente;
    }

}
