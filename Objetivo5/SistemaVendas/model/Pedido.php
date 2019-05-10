<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedido
 *
 * @author feijo
 */
class Pedido {
    private $id_pedido; 
    private $idFormaPagamento; 
    private $estado; 
    private $dtCriacao; 
    private $dtModific; 
    private $totalPedido; 
    private $situacao; 
    private $itemPedido;
    private $cliente;
    
    function __construct($id_pedido, $idformaPagamento, $estado, $dtCriacao, $dtModific, $totalPedido, $situacao, $itemPedido, $cliente) {
        $this->id_pedido = $id_pedido;
        $this->idformaPagamento = $idformaPagamento;
        $this->estado = $estado;
        $this->dtCriacao = $dtCriacao;
        $this->dtModific = $dtModific;
        $this->totalPedido = $totalPedido;
        $this->situacao = $situacao;
        $this->itemPedido = $itemPedido;
        $this->cliente = $cliente;
    }
    
    function getId_pedido() {
        return $this->id_pedido;
    }

    function getIdFormaPagamento() {
        return $this->idformaPagamento;
    }

    function getEstado() {
        return $this->estado;
    }

    function getDtCriacao() {
        return $this->dtCriacao;
    }

    function getDtModific() {
        return $this->dtModific;
    }

    function getTotalPedido() {
        return $this->totalPedido;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getItemPedido() {
        return $this->itemPedido;
    }

    function getCliente() {
        return $this->cliente;
    }

    function setId_pedido($id_pedido) {
        $this->id_pedido = $id_pedido;
    }

    function setIdFormaPagamento($idformaPagamento) {
        $this->idformaPagamento = $idformaPagamento;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setDtCriacao($dtCriacao) {
        $this->dtCriacao = $dtCriacao;
    }

    function setDtModific($dtModific) {
        $this->dtModific = $dtModific;
    }

    function setTotalPedido($totalPedido) {
        $this->totalPedido = $totalPedido;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setItemPedido($itemPedido) {
        $this->itemPedido = $itemPedido;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function __toString() {
        return "$this->cliente + $this->dtCriacao + $this->dtModific + $this->estado + $this->id_pedido + $this->idformaPagamento + $this->itemPedido + $this->situacao + $this->totalPedido";
    }

}
