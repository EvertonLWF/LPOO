<?php

include_once "Modelo.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Automovel
 *
 * @author feijo
 */
class Automovel {
    private $placa;
    private $cor;
    private $nroPortas;
    private $tipoCombustivel;
    private $Km;
    private $renavan;
    private $chassi;
    private $valorLocacao;
    private $situacao;
    private $modelo; 
    private $locacao = [];    
    
    public function __construct($descricao) {
        $marca = null;
        $this->modelo = new Modelo($marca);
        $this->modelo->setDescricao($descricao);
    }

    function setLocacao($locacao){
        $this->locacao = $locacao;
    }
    
    function getLocacao(){
        return $this->locacao;
    }
    function setModelo($modelo){
        $this->modelo = $modelo;
    }
    
    function getModelo(){
        return $this->modelo;
    }
    function getPlaca() {
        return $this->placa;
    }

    function getCor() {
        return $this->cor;
    }

    function getNroPortas() {
        return $this->nroPortas;
    }

    function getTipoCombustivel() {
        return $this->tipoCombustivel;
    }

    function getKm() {
        return $this->Km;
    }

    function getRenavan() {
        return $this->renavan;
    }

    function getChassi() {
        return $this->chassi;
    }

    function getValorLocacao() {
        return $this->valorLocacao;
    }
    function getSituacao() {
        return $this->situacao;
    }
    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setPlaca($placa) {
        $this->placa = $placa;
    }

    function setCor($cor) {
        $this->cor = $cor;
    }

    function setNroPortas($nroPortas) {
        $this->nroPortas = $nroPortas;
    }

    function setTipoCombustivel($tipoCombustivel) {
        $this->tipoCombustivel = $tipoCombustivel;
    }

    function setKm($Km) {
        $this->Km = $Km;
    }

    function setRenavan($renavan) {
        $this->renavan = $renavan;
    }

    function setChassi($chassi) {
        $this->chassi = $chassi;
    }

    function setValorLocacao($valorLocacao) {
        $this->valorLocacao = $valorLocacao;
    }
    function __toString() {
        return "MODELO = ".$this->modelo->getDescricao()." SITUACAO = $this->situacao KM = $this->Km CHASSI = $this->chassi COR = $this->cor NUMERO PORTAS = $this->nroPortas RENAVAN = $this->placa $this->renavan TIPO COMBUSTIVEL $this->tipoCombustivel VALOR LOCACAO $this->valorLocacao";
    }

}
