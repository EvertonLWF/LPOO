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
    private $modelo;
    private $marca;
    
    function __construct($modelo, $marca) {
        $this->modelo = $modelo;
        $this->marca = $marca;
    }
    function getModelo() {
        return $this->modelo;
    }

    function getMarca() {
        return $this->marca;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function __toString() {
        return "MODELO = $this->modelo; MARCA = $this->marca";
    }

}
