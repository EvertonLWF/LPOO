<?php

include_once "Automovel.php";

include_once "Cliente.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Locacao
 *
 * @author feijo
 */
class Locacao {
    private $id_locacao;
    private $dt_locacao;
    private $hora_locacao;
    private $dt_devolucao;
    private $hora_devolucao;
    private $km;
    private $vl_calcao;
    private $vl_locacao;
    private $devolvido;
    private $situacao;
    private $automovel;
    private $cliente;
    
    function __construct($cpf,$renavan) {
        $marca = new Marca();
        $modelo = new Modelo($marca);
        $this->automovel = new Automovel($modelo->getDescricao());
        $this->automovel->setRenavan($renavan);
        $this->cliente = new Cliente();
        $this->cliente->setCpf_cli($cpf);
        
       
    }

    public function getId_locacao() {
        return $this->id_locacao;
    }

    public function getDt_locacao() {
        return $this->dt_locacao;
    }

    public function getHr_locacao() {
        return $this->hora_locacao;
    }

    public function getDt_devolucao() {
        return $this->dt_devolucao;
    }

    public function getHr_devolucao() {
        return $this->hora_devolucao;
    }

    public function getKm() {
        return $this->km;
    }

    public function getVl_calcao() {
        return $this->vl_calcao;
    }

    public function getVl_locacao() {
        return $this->vl_locacao;
    }

    public function getDevolvido() {
        return $this->devolvido;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getAutomovel() {
        return $this->automovel;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function setId_locacao($id_locacao) {
        $this->id_locacao = $id_locacao;
    }

    public function setDt_locacao($dt_locacao) {
        $this->dt_locacao = $dt_locacao;
    }

    public function setHora_locacao($hora_locacao) {
        $this->hora_locacao = $hora_locacao;
    }

    public function setDt_devolucao($dt_devolucao) {
        $this->dt_devolucao = $dt_devolucao;
    }

    public function setHora_devolucao($hora_devolucao) {
        $this->hora_devolucao = $hora_devolucao;
    }

    public function setKm($km) {
        $this->km = $km;
    }

    public function setVl_calcao($vl_calcao) {
        $this->vl_calcao = $vl_calcao;
    }

    public function setVl_locacao($vl_locacao) {
        $this->vl_locacao = $vl_locacao;
    }

    public function setDevolvido($devolvido) {
        $this->devolvido = $devolvido;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setAutomovel($automovel) {
        $this->automovel = $automovel;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

        
    function __toString() {
        return "ID = $this->id_locacao SITUACAO = $this->situacao CLIENTE =".var_dump($this->cliente)." DEVOLVIDO  = $this->devolvido DATA DEVOLUCAO  = $this->dt_devolucao DATA LOCACAO  = $this->dt_locacao HORA DEVOLUCAO = $this->hora_devolucao HORA LOCACAO = $this->hora_locacao KILOMETRAGEM $this->km.KM VALOR CALCAO = $this->vl_calcao VALOR LOCACAO = $this->vl_locacao AUTOMOVEL =  $this->automovel";
    }


}
