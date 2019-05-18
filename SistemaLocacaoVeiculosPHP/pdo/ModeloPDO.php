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
            $stmt = $this->conn->prepare("SELECT * FROM automovel WHERE situacao = true");
            if($stmt->execute()){
                $auto= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($auto, $this->resultSetProduto($rs));
                }
                return $auto;
            }else{
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString()+'Erro findAll Automovel !!!!';
            return null;
        }

        
    }
    function findByAutomovel($auto){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo WHERE descricao like ? AND situacao = true");
            $stmt->bindValue(1, $auto+'%');
            if($stmt->execute()){
                $autos= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($autos, $this->resultSetProduto($rs));
                }
                return $autos;
            }else{
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString()+' Erro findByAuto !!!!!';
            return null;
        }

        
    }
    function update(Automovel $auto){
        $stmt = $this->conn->prepare('UPDATE modelo SET descricao = ?, marca = ?, situacao = ?');
        $stmt->bindValue(1, $auto->getDescricao());
        
      
        return $stmt->execute();
    }
    function insert($modelo){
        $stmt = $this->conn->prepare('INSERT INTO modelo (descricao,marca,situacao) VALUES(?,?,?)');
        $stmt->bindValue(1, $modelo->getNome());
        $stmt->bindValue(2, $modelo->getMarca());
        $stmt->bindValue(2, $modelo->getSituacao());
      
        return $stmt->execute();
        
    }
    function deleteSoft($auto){
        $stmt = $this->conn->prepare('UPDATE modelo SET situacao = ? WHERE descricao = ?');
        $stmt->bindValue(1, null);
        $stmt->bindValue(2, $modelo->getDescricao());
        return $stmt->execute();
    }
}
