<?php

include_once "ConnectPDO.php";

/**
 * Description of AutomovelPDO
 *
 * @author feijo
 */


class AutomovelPDO extends ConnectPDO{
    private $conn;
    
    function __construct() {
        $this->conn = parent::getConnect() ;
    }
    function findAll(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM automovel WHERE situacao = true");
            if($stmt->execute()){
                $cars= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($cars, $this->resultSetAutomoveis($rs));
                }
                return $cars;
            }else{
                return null;
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+' Erro findAll Automoveis!!!';
            return null;
        }

        
    }
    function findByMarca($car){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM automoveis WHERE descricao LIKE ? AND situacao = true");
            $stmt->bindValue(1, $car+'%');
            if($stmt->execute()){
                $cars= Array();
                while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                    array_push($cars, $this->resultSetProdutoAutomoveis($rs));
                }
                return $cars;
            }else{
                return null;
            }
        } catch (SQLException $exc) {
            echo $exc->getTraceAsString()+'Erro findByCar !!!';
            return null;
        }

        
    }
    function update($car){
        $stmt = $this->conn->prepare('UPDATE automovel SET renavan = ?,placa = ?,cor = initcap(?),numportas = ?,tipo_combust = ?,chassi = ?,valor_locacao = ?,descmodelo = initcap(?),situacao = ?,km = ?');
        $stmt->bindValue(1, $car->getRenavan());
        $stmt->bindValue(2, $car->getPlaca());
        $stmt->bindValue(3, $car->getCor());
        $stmt->bindValue(4, $car->getNroPortas());
        $stmt->bindValue(5, $car->getTipoCombustivel());
        $stmt->bindValue(6, $car->getChassi());
        $stmt->bindValue(7, $car->getValorLocacao());
        $stmt->bindValue(8, $car->getModelo());
        $stmt->bindValue(9, $car->getKm());
        $stmt->bindValue(10, $car->getSituacao());
      
        return $stmt->execute();
    }
    
    function insert($car){
        $stmt = $this->conn->prepare('INSERT INTO automovel (renavan,placa,cor,numportas,tipo_combust,chassi,valor_locacao,descmodelo,situacao,km) VALUES(?,?,initcap(?),?,?,?,?,initcap(?),?,?)');
        $stmt->bindValue(1, $car->getRenavan());
        $stmt->bindValue(2, $car->getPlaca());
        $stmt->bindValue(3, $car->getCor());
        $stmt->bindValue(4, $car->getNroPortas());
        $stmt->bindValue(5, $car->getTipoCombustivel());
        $stmt->bindValue(6, $car->getChassi());
        $stmt->bindValue(7, $car->getValorLocacao());
        $stmt->bindValue(8, $car->getModelo());
        $stmt->bindValue(9, true);
        $stmt->bindValue(10, $car->getKm());
      
        return $stmt->execute();
    }
    
    function deleteSoft($car){
        $stmt = $this->conn->prepare('UPDATE automovel SET situacao = ? WHERE renavan = ?');
        $stmt->bindValue(1, $car->getRenavan());
        $stmt->bindValue(2, null);
        
        return $stmt->execute();
    }
    
    function reactivateAutomovel($car){
        $stmt = $this->conn->prepare('UPDATE automovel SET situacao = ? WHERE renavan = ?');
        $stmt->bindValue(1, $car->getRenavan());
        $stmt->bindValue(2, true);
        
        return $stmt->execute();
    }
    private function resultSetAutomoveis($rs){
        $automoveis = new Automovel($rs->descmodelo);
        $automoveis->setChassi($rs->chassi);
        $automoveis->setCor($rs->cor);
        $automoveis->setNroPortas($rs->numportas);
        $automoveis->setKm($rs->km);
        $automoveis->setPlaca($rs->placa);
        $automoveis->setRenavan($rs->renavan);
        $automoveis->setSituacao($rs->situacao);
        $automoveis->setTipoCombustivel($rs->tipo_combust);
        $automoveis->setValorLocacao($rs->valor_locacao);
    
        return $automoveis;
        
    }
}
