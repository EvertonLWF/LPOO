<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author feijo
 */
class Cliente {
    private $id_cliente;    
    private $nome;    
    private $sobrenome;    
    private $situacao;
    private $pedido;
    
    function __construct($id_cliente, $nome, $sobrenome, $situacao) {
        $this->id_cliente = $id_cliente;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->situacao = $situacao;
    }
    function getId_cliente() {
        return $this->id_cliente;
    }

    function getNome() {
        return $this->nome;
    }

    function getSobrenome() {
        return $this->sobrenome;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getPedido() {
        return $this->pedido;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setPedido($pedido) {
        $this->pedido = $pedido;
    }

    function __toString() {
        return "$this->id_cliente + $this->nome + $this->pedido + $this->situacao + $this->sobrenome";
    }

}
