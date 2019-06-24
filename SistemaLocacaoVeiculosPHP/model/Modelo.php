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
    private $id_modelo;
    private $descricao;
    private $situacao;
    private $marca;
    private $automoveis = [];
    
    
    function __construct($id) {
        $this->marca = new Marca();
        $this->marca->setId($id);
    }
    
    public function getId_modelo() {
        return $this->id_modelo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getAutomoveis() {
        return $this->automoveis;
    }

    public function setId_modelo($id_modelo) {
        $this->id_modelo = $id_modelo;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setAutomoveis($automoveis) {
        $this->automoveis = $automoveis;
    }
        
    function __toString() {
        return "ID = $this->id_modelo DESCRICAO = $this->descricao SITUACAO = $this->situacao MARCA = ".print_r($this->marca)." AUTOMOVEIS = ".print_r($this->automoveis)." \n";
    }
    
}
