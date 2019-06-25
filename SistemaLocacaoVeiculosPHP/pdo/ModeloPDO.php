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
            $stmt = $this->conn->prepare("SELECT * FROM modelo WHERE situacao = true");
            if($stmt->execute()){
                $auto= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($auto, $this->resultSetToModelo($rs));
                }
                //print_r($rs);
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+'Erro findAll Modelo !!!!';
        }
        return $auto;
    }
    function findAllR(){
        $auto = null;
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo WHERE situacao = false");
            if($stmt->execute()){
                $auto= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($auto, $this->resultSetToModelo($rs));
                }
                //print_r($rs);
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+'Erro findAllR Modelo !!!!';
        }
        return $auto;
    }
    
    
    
    function findByModelo($modelo){
            $modelos = null;
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo WHERE descmodelo = initcap(?) AND situacao = true");
            $stmt->bindValue(1, $modelo);
            if($stmt->execute()){
                $modelos = Array();
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
    function findModeloById($id){
            $modelos = null;
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo WHERE id_modelo = ? AND situacao = true");
            $stmt->bindValue(1, $id);
            if($stmt->execute()){
                $modelos = Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($modelos, $this->resultSetToModelo($rs));
                }
          
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+' Erro findAuroById !!!!!';
            $modelos = null;
        }
        return $modelos;

        
    }
    function findByModeloR($modelo){
            $modelos = null;
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo WHERE descmodelo = initcap(?) AND situacao = false");
            $stmt->bindValue(1, $modelo);
            if($stmt->execute()){
                $modelos = Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($modelos, $this->resultSetToModelo($rs));
                }
          
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+' Erro findByAutoR !!!!!';
            $modelos = null;
        }
        return $modelos;

        
    }
    function findModeloByMarca($marca){
            $modelos = null;
        try {
            $stmt = $this->conn->prepare("SELECT * FROM modelo WHERE id_marca = ? AND situacao = true");
            $stmt->bindValue(1, $marca);
            if($stmt->execute()){
                $modelos = Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($modelos, $this->resultSetToModelo($rs));
                }
          
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+' Erro findAutoByMarca !!!!!';
            $modelos = null;
        }
        return $modelos;

        
    }
    function update($modelo){
        $stmt = $this->conn->prepare('UPDATE modelo SET descmodelo = initcap(?), id_marca = ?, situacao = ? WHERE id_modelo = ?');
        $stmt->bindValue(1, $modelo->getDescricao());
        $stmt->bindValue(2, $modelo->getMarca()->getId());
        $stmt->bindValue(3, $modelo->getSituacao());
        $stmt->bindValue(4, $modelo->getId_modelo());
      
        return $stmt->execute();
    }
    function insert($modelo){
        $stmt = $this->conn->prepare('INSERT INTO modelo (descmodelo,id_marca,situacao) VALUES (initcap(?),?,?)');
        $stmt->bindValue(1, $modelo->getDescricao());
        $stmt->bindValue(2, $modelo->getMarca()->getId());
        $stmt->bindValue(3, $modelo->getSituacao());
        return $stmt->execute();
        
    }
    function deleteSoft($modelo){
        $stmt = $this->conn->prepare('UPDATE modelo SET situacao = ? WHERE descmodelo = initcap(?)');
        $stmt->bindValue(1, 0);
        $stmt->bindValue(2, $modelo);
        return $stmt->execute();
    }
    function reactivateModelo($modelo){
        $stmt = $this->conn->prepare('UPDATE modelo SET situacao = ? WHERE id_modelo = ?');
        $stmt->bindValue(1, true);
        $stmt->bindValue(2, $modelo);
        return $stmt->execute();
    }
    private function resultSetToModelo($rs){
        $modelo = new Modelo($rs->id_marca);
        $modelo->setDescricao($rs->descmodelo);
        $modelo->setSituacao($rs->situacao);
        $modelo->setId_modelo($rs->id_modelo);
        return $modelo;
    }
}
