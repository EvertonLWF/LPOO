<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Marca
 *
 * @author feijo
 */
class Marca {
   
    private $marca;
    private $situacao;
    
    function __construct() {
        
    }
    
    function getMarca() {
        return $this->marca;
    }

   
    function setMarca($marca) {
        $this->marca = $marca;
    }
    
    function getSituacao() {
        return $this->situacao;
    }

   
    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function __toString() {
        return "DESCRICAO = $this->marca STATUS = $this->situacao ";
    }

}
