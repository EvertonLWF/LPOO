<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao
 *
 * @author feijo
 */
class Conexao {
    protected function getConnect(){
        try {
            $pdo = new PDO('pgsql:dbname=vendas;user=postgres;password=root;host=localhost');
           
            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //define para que o PDO lance exceções na ocorrência de erros
            print_r($pdo);
            print_r($pdo->getAvailableDrivers());

            
            return $pdo;
        } catch (PDOException $ex) {
            echo $ex->getFile() . ' ### ' . $ex->getLine() . ' ### ' . $ex->getMessage() . ' ### ' . $ex->getCode();
            return null;
        }
    }
}
