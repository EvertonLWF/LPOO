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
    
    function __construct($modelo,$situacao) {
        $this->marca = $marca;
        $this->situacao = $situacao;
    }
    
    function getMarca() {
        return $this->marca;
    }

   
    function setMarca($marca) {
        $this->marca = $marca;
    }
    
    function getSituacao() {
        return $this->Situacao;
    }

   
    function setSituacao($Situacao) {
        $this->Situacao = $Situacao;
    }

    function __toString() {
        return "MARCA = $this->marca SITUACAO = $this->situacao";
    }

}
