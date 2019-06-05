<?php

include_once "../model/Modelo.php";

include_once "ConnectPDO.php";

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
        $auto = null;
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo");
            if($stmt->execute()){
                $auto= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($auto, $this->resultSetToModelo($rs));
                }
                print_r($rs);
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+'Erro findAll Modelo !!!!';
        }
                return $auto;
    }
    
    
    
    function findByModelo($modelo){
            
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo WHERE descmodelo = initcap(?) AND situacao = true");
            $stmt->bindValue(1, $modelo);
            if($stmt->execute()){
                $modelos= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($modelos, $this->resultSetToModelo($rs));
                }
          
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+' Erro findByAuto !!!!!';
            $modelos = null;
        }
                return $modelos;

        
    }
    function update($modelo,$chave){
        $stmt = $this->conn->prepare('UPDATE modelo SET descmodelo = initcap(?), descmarca = initcap(?), situacao = ? WHERE descmodelo = initcap(?)');
        $stmt->bindValue(1, $modelo->getDescricao());
        $stmt->bindValue(2, $modelo->getMarca());
        $stmt->bindValue(3, $modelo->getSituacao());
        $stmt->bindValue(4, $chave);
      
        return $stmt->execute();
    }
    function insert($modelo){
        $stmt = $this->conn->prepare('INSERT INTO modelo (descmodelo,descmarca,situacao) VALUES(initcap(?),initcap(?),?)');
        $stmt->bindValue(1, $modelo->getDescricao());
        $stmt->bindValue(2, $modelo->getMarca());
        $stmt->bindValue(3, $modelo->getSituacao());
        return $stmt->execute();
        
    }
    function deleteSoft($modelo){
        $stmt = $this->conn->prepare('UPDATE modelo SET situacao = ? WHERE descricao = initcap(?)');
        $stmt->bindValue(1, false);
        $stmt->bindValue(2, $modelo->getDescricao());
        return $stmt->execute();
    }
    function reactivateModelo($modelo){
        $stmt = $this->conn->prepare('UPDATE modelo SET situacao = ? WHERE descricao = initcap(?)');
        $stmt->bindValue(1, true);
        $stmt->bindValue(2, $modelo->getDescricao());
        return $stmt->execute();
    }
    private function resultSetToModelo($rs){
        $modelo = new Modelo($rs->descmarca);
        $modelo->setDescricao($rs->descmodelo);
        $modelo->setSituacao($rs->situacao);
        return $modelo;
    }
}
