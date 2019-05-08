<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pdo_conexao
 *
 * @author feijo
 */
class Pdo_conexao {
    private $dbName;
    private $user;
    private $pass;
    private $host;
    
    function __construct($dbName, $user, $pass, $host) {
        $this->dbName = $dbName;
        $this->user = $user;
        $this->pass = $pass;
        $this->host = $host;
    }
    
    function connect(){
        
        try {
            $conn = new PDO($this->dbName, $this->user, $this->pass,$this->host);
            
        } catch (Exception $ex) {
            echo 'FALHOU A TENTATIVA DE CONEXÇÃO   = $EX';
        }
    }

}
