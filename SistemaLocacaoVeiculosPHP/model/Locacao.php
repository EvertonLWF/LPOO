<?php

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
    private $cliente;
    private $automovel;
    private $situacao;
    
    function __construct($id_locacao, $dt_locacao, $hora_locacao, $dt_devolucao, $hora_devolucao, $km, $vl_calcao, $vl_locacao, $devolvido, $cliente, $automovel, $situacao) {
        $this->dt_locacao = $dt_locacao;
        $this->id_locacao = $id_locacao;
        $this->hora_locacao = $hora_locacao;
        $this->dt_devolucao = $dt_devolucao;
        $this->hora_devolucao = $hora_devolucao;
        $this->km = $km;
        $this->vl_calcao = $vl_calcao;
        $this->vl_locacao = $vl_locacao;
        $this->devolvido = $devolvido;
        $this->cliente = $cliente;
        $this->automovel = $automovel;
        $this->situacao = $situacao;
    }

    function getDt_locacao() {
        return $this->dt_locacao;
    }

    function getHora_locacao() {
        return $this->hora_locacao;
    }

    function getDt_devolucao() {
        return $this->dt_devolucao;
    }

    function getHora_devolucao() {
        return $this->hora_devolucao;
    }

    function getKm() {
        return $this->km;
    }

    function getVl_calcao() {
        return $this->vl_calcao;
    }

    function getVl_locacao() {
        return $this->vl_locacao;
    }

    function getDevolvido() {
        return $this->devolvido;
    }

    function getCliente() {
        return $this->cliente;
    }
    function getId() {
        return $this->cliente;
    }
    function setSet($id) {
        $this->cliente = $id;
    }

    function setDt_locacao($dt_locacao) {
        $this->dt_locacao = $dt_locacao;
    }

    function setHora_locacao($hora_locacao) {
        $this->hora_locacao = $hora_locacao;
    }

    function setDt_devolucao($dt_devolucao) {
        $this->dt_devolucao = $dt_devolucao;
    }

    function setHora_devolucao($hora_devolucao) {
        $this->hora_devolucao = $hora_devolucao;
    }

    function setKm($km) {
        $this->km = $km;
    }

    function setVl_calcao($vl_calcao) {
        $this->vl_calcao = $vl_calcao;
    }

    function setVl_locacao($vl_locacao) {
        $this->vl_locacao = $vl_locacao;
    }

    function setDevolvido($devolvido) {
        $this->devolvido = $devolvido;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }
    function setAutomovel($automovel) {
        $this->automovel = $automovel;
    }

    function getAutomovel() {
        return $this->automovel;
    }
    function getSituacao() {
        return $this->situacao;
    }
    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }
    
    function __toString() {
        return "ID = $this->id_locacao; SITUACAO = $this->situacao; CLIENTE = $this->cliente; DEVOLVIDO $this->devolvido; DATA DEVOLUCAO $this->dt_devolucao;DATA LOCACAO $this->dt_locacao;HORA DEVOLUCAO = $this->hora_devolucao; HORA LOCACAO = $this->hora_locacao; KILOMETRAGEM $this->km KM; VALOR CALCAO = $this->vl_calcao; VALOR LOCACAO = $this->vl_locacao; AUTOMOVEL =  $this->automovel";
    }


}
