<?php

include_once "ConnectPDO.php";

include_once "../model/Cliente.php";

/**
 * Description of ClientePDO
 *
 * @author feijo
 */
class ClientePDO extends ConnectPDO{
    private $conn;
    
    function __construct() {
        $this->conn = parent::getConnect() ;
    }
    function findAll(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE situacao = true");
            if($stmt->execute()){
                $clientes= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($clientes, $this->resultSetToClientes($rs));
                }
                return $clientes;
            }else{
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString()+' Erro findAll cliente!!!!!';
            return null;
        }

        
    }
    function findByClient($nome){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE nome_cli  = initcap(?)");
            $stmt->bindValue(1, $nome);
            if($stmt->execute()){
                $clientes= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($clientes, $this->resultSetToClientes($rs));
                }
                return $clientes;
            }else{
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString()+' Erro findByClient!!!!!';
            return null;
        }

        
    }
    function findClientByCpf($cpf){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE cpf_cli  = ?");
            $stmt->bindValue(1, $cpf);
            if($stmt->execute()){
                $clientes= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($clientes, $this->resultSetToClientes($rs));
                }
                return $clientes;
            }else{
                return null;
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+' Erro findClientByCpf!!!!!';
            return null;
        }

        
    }
    function findClientByCpfR($cpf){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM clientes WHERE cpf_cli  = ? AND situacao = false");
            $stmt->bindValue(1, $cpf);
            if($stmt->execute()){
                $clientes= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($clientes, $this->resultSetToClientes($rs));
                }
                return $clientes;
            }else{
                return null;
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+' Erro findClientByCpfReactivate!!!!!';
            return null;
        }

        
    }
    function update(Cliente $clientes){
        
        $stmt = $this->conn->prepare('UPDATE clientes SET nome_cli = initcap(?), end_cli = initcap(?), tel_cliente = ?, email_cli = ?, situacao = ? WHERE cpf_cli = ?');
        $stmt->bindValue(1, $clientes->getNome_cli());
        $stmt->bindValue(2, $clientes->getEnd_cli());
        $stmt->bindValue(3, $clientes->getTel_cli());
        $stmt->bindValue(4, $clientes->getEmail_cli());
        $stmt->bindValue(5, $clientes->getSituacao());
        $stmt->bindValue(6, $clientes->getCpf_cli());
        
      
        return $stmt->execute();
    }
    function insert($cliente){
        $stmt = $this->conn->prepare('INSERT INTO clientes (cpf_cli,nome_cli,end_cli,tel_cliente,email_cli,situacao) VALUES(?,initcap(?),initcap(?),?,?,?)');
        $stmt->bindValue(1, $cliente->getCpf_cli());
        $stmt->bindValue(2, $cliente->getNome_cli());
        $stmt->bindValue(3, $cliente->getEnd_cli());
        $stmt->bindValue(4, $cliente->getTel_cli());
        $stmt->bindValue(5, $cliente->getEmail_cli());
        $stmt->bindValue(6, $cliente->getSituacao());
        
        return $stmt->execute();
        
    }
    function deleteSoft($cliente){
        $stmt = $this->conn->prepare('UPDATE clientes SET situacao = ? WHERE cpf_cli = ?');
        $stmt->bindValue(1, 0);
        $stmt->bindValue(2, $cliente->getCpf_cli());
        return $stmt->execute();
    }
    
    function reactivateCliente($cliente){
        $stmt = $this->conn->prepare('UPDATE clientes SET situacao = ? WHERE cpf_cli = ?');
        $stmt->bindValue(1, true);
        $stmt->bindValue(2, $cliente->getCpf_cli());
        return $stmt->execute();
    }
    
    private function resultSetToClientes($rs){
        $cliente = new Cliente();
        $cliente->setCpf_cli($rs->cpf_cli);
        $cliente->setEmail_cli($rs->email_cli);
        $cliente->setEnd_cli($rs->end_cli);
        $cliente->setNome_cli($rs->nome_cli);
        $cliente->setSituacao($rs->situacao);
        $cliente->setTel_cli($rs->tel_cliente);
      
        return $cliente;
    }
}
