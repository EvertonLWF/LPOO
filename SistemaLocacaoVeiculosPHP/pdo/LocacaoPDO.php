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
    function update($loc){
        $stmt = $this->conn->prepare('UPDATE marca SET dt_devolucao = ?,hr_devolucao = ?, km = ?, valor_caucao = ?, valor_locacao = ?, cpf_cli = ?, renavan = ?, situacao = ? WHERE id_locacao = ?');
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
    
    function insert(Locacao $loc){
        $stmt = $this->conn->prepare('INSERT INTO locacao (id_locacao,dt_locacao,hr_locacao,dt_devolocao,hr_devolucao,km,valor_caucao,valor_locacao,cpf_cli,renavan) VALUES(?,?,?,?,?,?,?,?,?,?)');
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        $stmt->bindValue(1, md5($date->format('Y-m-d H:i:s.u')));
        $stmt->bindValue(2, $date->format('Y-m-d'));
        $stmt->bindValue(3, $date->format('H:i:s.u'));
        $stmt->bindValue(4, $loc->getDt_devolucao());
        $stmt->bindValue(5, $loc->getHora_devolucao());
        $stmt->bindValue(6, $loc->getKm());
        $stmt->bindValue(7, $loc->getVl_calcao());
        $stmt->bindValue(8, $loc->getVl_locacao());
        $stmt->bindValue(9, $loc->getCliente());
        $stmt->bindValue(10, $loc->getAutomovel());
       
        return $stmt->execute();
    }
    
    function deleteSoft($id){
        $stmt = $this->conn->prepare('UPDATE locacao SET situacao = ? WHERE id_locacao = ?');
        $stmt->bindValue(1, null);
        $stmt->bindValue(2,$id);
        
        return $stmt->execute();
    }
}
