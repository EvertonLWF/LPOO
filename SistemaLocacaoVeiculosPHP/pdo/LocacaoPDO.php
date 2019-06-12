<?php

include_once "../model/Locacao.php";

include_once "../model/Automovel.php";

include_once "../model/Cliente.php";

include_once "ConnectPDO.php";

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
        $this->conn = parent::getConnect();
         
    }
    function findAll(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM locacao WHERE situacao = true");
            if($stmt->execute()){
                $locacoes= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($locacoes, $this->resultSetToLocacao($rs));
                }
                return $locacoes;
            }else{
                return null;
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+' Erro findAll Locacao!!!';
            return null;
        }

        
    }
    function findByLocacao($id_Locacao){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM locacao WHERE id_locacao = ? AND situacao = true");
            $stmt->bindValue(1, $id_Locacao);
            if($stmt->execute()){
                $locacoes= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($locacoes, $this->resultSetToLocacao($rs));
                }
                return $locacoes[0];
            }else{
                return null;
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+'Erro findByLocacao !!!';
            return null;
        }
       
    }
    function findLocacaoByCliente($cpf){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM locacao WHERE cpf_cli = ? AND situacao = true");
            $stmt->bindValue(1, $cpf);
            if($stmt->execute()){
                $locacoes= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($locacoes, $this->resultSetToLocacao($rs));
                }
                return $locacoes[0];
            }else{
                return null;
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+'Erro findLocacaoByCliente !!!';
            return null;
        }
       
    }
    function findLocacaoByRenavan($renavan){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM locacao WHERE renavan = ? AND situacao = true");
            $stmt->bindValue(1, $renavan);
            if($stmt->execute()){
                $locacoes= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($locacoes, $this->resultSetToLocacao($rs));
                }
                return $locacoes[0];
            }else{
                return null;
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+'Erro findLocacaoByrenavan !!!';
            return null;
        }
       
    }
    function update($loc){
        $stmt = $this->conn->prepare('UPDATE locacao SET dt_devolucao = ?,hr_devolucao = ?, km = ?, valor_caucao = ?, valor_locacao = ?, cpf_cli = ?, renavan = ?, situacao = ? WHERE id_locacao = ?');
        $stmt->bindValue(1, $loc->getDt_devolucao());
        $stmt->bindValue(2, $loc->getHora_devolucao());
        $stmt->bindValue(3, $loc->getKm());
        $stmt->bindValue(4, $loc->getVl_calcao());
        $stmt->bindValue(5, $loc->getCliente());
        $stmt->bindValue(6, $loc->getAutomovel());
        $stmt->bindValue(7, $loc->getSituacao());
        $stmt->bindValue(8, $loc->getId());
        
        return $stmt->execute();
    }
    
    function insert($loc){
        $stmt = $this->conn->prepare('INSERT INTO locacao (id_locacao,dt_locacao,hr_locacao,dt_devolucao,hr_devolucao,km,valor_caucao,valor_locacao,cpf_cli,renavan,situacao,devolvido) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        $stmt->bindValue(1, md5($date->format('Y-m-d H:i:s.u')));//ok
        $stmt->bindValue(2, $date->format('Y-m-d'));//ok
        $stmt->bindValue(3, $date->format('H:i:s.u'));//ok
        $stmt->bindValue(4, $loc->getDt_devolucao());//ok
        $stmt->bindValue(5, $loc->getHora_devolucao());//ok
        $stmt->bindValue(6, $loc->getKm());//km
        $stmt->bindValue(7, $loc->getVl_calcao());//ok
        $stmt->bindValue(8, $loc->getVl_locacao());//ok
        $stmt->bindValue(9, $loc->getCliente()->getCpf_Cli());//ok
        $stmt->bindValue(10, $loc->getAutomovel()->getRenavan());//ok
        $stmt->bindValue(11, $loc->getSituacao());
        $stmt->bindValue(12, $loc->getDevolvido());
       
        return $stmt->execute();
    }
    
    function deleteSoft($id){
        $stmt = $this->conn->prepare('UPDATE locacao SET situacao = ? WHERE id_locacao = ?');
        $stmt->bindValue(1, null);
        $stmt->bindValue(2,$id);
        
        return $stmt->execute();
    }
    function reactivateLocacao($locacao){
        $stmt = $this->conn->prepare('UPDATE locacao SET situacao = ? WHERE id_locacao = ?');
        $stmt->bindValue(1, true);
        $stmt->bindValue(2, $locacao->getId());
        return $stmt->execute();
    }
    private function resultSetToLocacao($rs){
        $locacao  = new Locacao($rs->cpf_cli,$rs->renavan);
        $locacao->setId_locacao($rs->id_locacao);
        $locacao->setDt_locacao($rs->dt_locacao);
        $locacao->setHora_locacao($rs->hr_locacao);
        $locacao->setDt_devolucao($rs->dt_devolucao);
        $locacao->setHora_devolucao($rs->hr_devolucao);
        $locacao->setKm($rs->km);
        $locacao->setVl_calcao($rs->valor_caucao);
        $locacao->setVl_locacao($rs->valor_locacao);
        $locacao->setSituacao($rs->situacao);
        $locacao->setDevolvido($rs->devolvido);
      
        return $locacao;
    }
}
