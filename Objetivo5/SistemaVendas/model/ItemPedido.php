<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemPedido
 *
 * @author feijo
 */
class ItemPedido {
    private $id_itemPedido;
    private $quantidade;
    private $totalItem;
    private $situacao;
    private $produto;
    
    function __construct($id_itemPedido, $quantidade, $totalItem, $situacao, $produto) {
        $this->id_itemPedido = $id_itemPedido;
        $this->quantidade = $quantidade;
        $this->totalItem = $totalItem;
        $this->situacao = $situacao;
        $this->produto = $produto;
    }
    function getId_itemPedido() {
        return $this->id_itemPedido;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getTotalItem() {
        return $this->totalItem;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getProduto() {
        return $this->produto;
    }

    function setId_itemPedido($id_itemPedido) {
        $this->id_itemPedido = $id_itemPedido;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setTotalItem($totalItem) {
        $this->totalItem = $totalItem;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

    function __toString() {
        return "$this->id_itemPedido + $this->produto + $this->quantidade + $this->situacao + $this->totalItem";
    }

}
