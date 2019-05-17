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
    
    function __construct($modelo) {
        $this->marca = $marca;
    }
    
    function getMarca() {
        return $this->marca;
    }

   
    function setMarca($marca) {
        $this->marca = $marca;
    }

    function __toString() {
        return "MARCA = $this->marca";
    }

}
