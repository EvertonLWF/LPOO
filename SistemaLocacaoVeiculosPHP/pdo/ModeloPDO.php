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
    function findByModelo($marca){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo WHERE descricao like ?");
            $stmt->bindValue(1, $marca+'%');
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
        $stmt = $this->conn->prepare('UPDATE modelo SET descricao = ? marca = ? situacao = ?');
        $stmt->bindValue(1, $modelo->getDescricao());
        $stmt->bindValue(2, $modelo->getMarca());
        $stmt->bindValue(3, $modelo->getSituacao());
      
        return $stmt->execute();
    }
    function insert($modelo){
        $stmt = $this->conn->prepare('INSERT INTO modelo (descricao,marca,situacao) VALUES(?,?,?)');
        $stmt->bindValue(1, $modelo->getNome());
        $stmt->bindValue(2, $modelo->getMarca());
        $stmt->bindValue(2, $modelo->getSituacao());
      
        return $stmt->execute();
        
    }
    function deleteSoft($modelo){
        $stmt = $this->conn->prepare('UPDATE modelo SET situacao = ? WHERE descricao = ?');
        $stmt->bindValue(1, null);
        $stmt->bindValue(2, $modelo->getDescricao());
        return $stmt->execute();
    }
}
