<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MarcaPDO
 *
 * @author feijo
 */
class MarcaPDO extends ConnectPDO{
    private $conn;
    
    function __construct() {
        $this->conn = parent::getConnect();
    }
    function select(){
        
    }
    function insert(){
        
    }
    function update(){
        
    }
    function delete(){
        
    }
}
