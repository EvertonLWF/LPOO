<?php

/**
 * Description of Produto
 *
 * @author vagner
 */
class Produto {
    private $nome;
    private $descricacao;
    private $valor;
    private $quantidade;
    
    public function __construct() {
        
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function getDescricacao() {
        return $this->descricacao;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDescricacao($descricacao) {
        $this->descricacao = $descricacao;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function __toString() {
        return "Produto{nome=$this->nome, descricacao=$this->descricacao, valor=$this->valor, quantidade=$this->quantidade]";
    }
}
