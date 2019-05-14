<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConnectPDO
 *
 * @author feijo
 */
class ConnectPDO {
    protected function getConnect(){
        try {
            $pdo = new PDO('pgsql:dbname=sistemaLocacaoVeiculos;user=postgres;password=root;host=localhost');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //define para que o PDO lance exceções na ocorrência de erros
            print_r($pdo);
            print_r($pdo->getAvailableDrivers());
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            echo $exc->getFile() . ' ### ' . $ex->getLine() . ' ### ' . $exc->getMessage() . ' ### ' . $exc->getCode();

        }
    }
}
