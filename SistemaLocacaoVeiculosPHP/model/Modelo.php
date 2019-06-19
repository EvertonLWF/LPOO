<?php

include_once "../pdo/MarcaPDO.php";

include_once "Marca.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Modelo
 *
 * @author feijo
 */
class Modelo{
    private $descricao;
    private $marca;
    private $situacao;
    private $automoveis = [];
    
    function __construct($marca) {
        $this->marca = $marca;
    }
    
    function getDescricao() {
        return $this->descricao;
    }

    function getMarca() {
        return $this->marca;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }
    function setAutomoveis($automoveis) {
        $this->automoveis = $automoveis;
    }
    function getAutomoveis($automoveis) {
        return $this->automoveis;
    }

        
    function __toString() {
        return "DESCRICAO = $this->descricao MARCA = ". print_r($this->marca)." AUTOMOVEIS = ". print_r($this->automoveis)." SITUACAO = $this->situacao \n";
    }
    
}
