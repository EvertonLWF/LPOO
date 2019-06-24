<?php

include_once "Modelo.php";

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
   
    private $id;
    private $marca;
    private $situacao;
    private $modelos = []; //Associa modelos
    
    function __construct() {
    }
    
    public function getMarca() {
        return $this->marca;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function getModelos() {
        return $this->modelos;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    public function setModelos($modelos) {
        $this->modelos = $modelos;
    }

    
    
    public function __toString() {
        return "ID = $this->id DESCRICAO = $this->marca STATUS = $this->situacao ". print_r($this->modelos);
    }

}
