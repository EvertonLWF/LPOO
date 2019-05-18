<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LocacaoPDO
 *
 * @author feijo
 */
class LocacaoPDO extends ConnectPDO{
    private $conn;
    
    function __construct() {
        $this->conn = parent::getConnect() ;
    }
    function findAll(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM locacao WHERE situacao = true");
            if($stmt->execute()){
                $locacoes= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($locacoes, $this->resultSetProduto($rs));
                }
                return $locacoes;
            }else{
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString()+' Erro findAll Locacao!!!';
            return null;
        }

        
    }
    function findByLocacao(Locacao $id_Locacao){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM marca WHERE descricao = ? AND situacao = true");
            $stmt->bindValue(1, $id_Locacao);
            if($stmt->execute()){
                $locacoes= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($locacoes, $this->resultSetProduto($rs));
                }
                return $locacoes;
            }else{
                return null;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString()+'Erro findByLocacao !!!';
            return null;
        }

        
    }
    function update(Locacao $loc){
        $stmt = $this->conn->prepare('UPDATE marca SET id_locacao = ?,dt_locacao = ?,hr_locacao = ?,dt_devolucao = ?,hr_devolucao = ?, km = ?, valor_caucao = ?, valor_locacao = ?, cpf_cli = ?, renavan = ?, situacao = ?');
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        $stmt->bindValue(1, md5($date->format('Y-m-d H:i:s.u')));
        
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
