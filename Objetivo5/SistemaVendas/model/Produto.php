<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author feijo
 */
class Produto {
    private $id_produto;
    private $nome;
    private $descricao;
    private $valor;
    private $situacao;
    
    function __construct() {
        
    }
    function getId_produto() {
        return $this->id_produto;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getValor() {
        return $this->valor;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function setId_produto($id_produto) {
        $this->id_produto = $id_produto;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function __toString() {
        return "$this->descricao + $this->id_produto + $this->nome + $this->situacao + $this->valor";
    }

}
