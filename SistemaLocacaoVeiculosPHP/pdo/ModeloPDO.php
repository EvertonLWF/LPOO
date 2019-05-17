<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModeloPDO
 *
 * @author feijo
 */
class ModeloPDO extends ConnectPDO{
    private $conn;
    
    function __construct() {
        $this->conn = parent::getConnect() ;
    }
    function findAll(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo");
            if($stmt->execute()){
                $modelos= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($modelos, $this->resultSetProduto($rs));
                }
                return $modelos;
            }else{
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return null;
        }

        
    }
    function findByMarca($marca){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo WHERE descricao = ?");
            $stmt->bindValue(1, $marca);
            if($stmt->execute()){
                $modelos= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($modelos, $this->resultSetProduto($rs));
                }
                return $modelos;
            }else{
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            return null;
        }

        
    }
    function update($modelo){
        $stmt = $this->conn->prepare('UPDATE modelo SET descricao = ?');
        $stmt->bindValue(1, $modelo->get());
      
        return $stmt->execute();
    }
    function insert($modelo){
        $stmt = $this->conn->prepare('INSERT INTO modelo (descricao) VALUES(?)');
        $stmt->bindValue(1, $modelo->getNome());
      
        return $stmt->execute();
        
    }
    function deleteSoft($modelo){
        $stmt = $this->conn->prepare('UPDATE modelo SET situacao = ? WHERE id = ?');
        $stmt->bindValue(1, $modelo->getSituacao());
        $stmt->bindValue(2, null);
        return $stmt->execute();
    }
}
