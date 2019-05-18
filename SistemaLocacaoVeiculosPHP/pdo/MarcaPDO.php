<?php

include_once "ConnectPDO.php";
/**
 * Description of MarcaPDO
 *
 * @author feijo
 */
class MarcaPDO extends ConnectPDO{
    private $conn;
    
    function __construct() {
        $this->conn = parent::getConnect() ;
    }
    function findAll(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM marca WHERE situacao = true");
            if($stmt->execute()){
                $marcas= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($marcas, $this->resultSetProduto($rs));
                }
                return $marcas;
            }else{
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString()+' Erro findAll Marca!!!';
            return null;
        }

        
    }
    function findByMarca($marca){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM marca WHERE descricao LIKE ? AND situacao = true");
            $stmt->bindValue(1, $marca+'%');
            if($stmt->execute()){
                $marcas= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($marcas, $this->resultSetProduto($rs));
                }
                return $marcas;
            }else{
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString()+'Erro findByMarca !!!';
            return null;
        }

        
    }
    function update($marca){
        $stmt = $this->conn->prepare('UPDATE marca SET descricao = ?,situacao = ?');
        $stmt->bindValue(1, $marca->getMarca());
        $stmt->bindValue(2, $marca->getSituacao());
      
        return $stmt->execute();
    }
    
    function insert($marca){
        $stmt = $this->conn->prepare('INSERT INTO marca (descricao,situacao) VALUES(?,?)');
        $stmt->bindValue(1, $marca->getMarca());
        $stmt->bindValue(2, $marca->getSituacao());
        
      
        return $stmt->execute();
    }
    
    function deleteSoft($descricao){
        $stmt = $this->conn->prepare('UPDATE marca SET situacao = ? WHERE descricao = ?');
        $stmt->bindValue(1, null);
        $stmt->bindValue(2, $descricao);
        
        return $stmt->execute();
    }
}
