<?php

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
class Modelo {
    private $descricao;
    private $automoveis = Array();
    
    function __construct($descricao, $automovel) {
        $this->descricao = $descricao;
        array_push($this->automoveis,$automovel);
    }
    function getDescricao() {
        return $this->descricao;
    }

    function getAutomoveis() {
        return $this->automoveis;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setAutomoveis($automoveis) {
        $this->automoveis = $automoveis;
    }

            
    function __toString() {
        return "DESCRICAO = $this->descricao";
    }
    
}
