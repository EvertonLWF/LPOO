<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 * @author feijo
 */
class Cliente {

    private $cpf_cli;
    private $nome_cli;
    private $end_cli;
    private $tel_cli;
    private $email_cli;
    private $situacao;
    private $locacoes = array();

    function __construct() {
       
    }
     public function getCpf_cli() {
        return $this->cpf_cli;
    }

    public function getNome_cli() {
        return $this->nome_cli;
    }

    public function getEnd_cli() {
        return $this->end_cli;
    }

    public function getTel_cli() {
        return $this->tel_cli;
    }

    public function getEmail_cli() {
        return $this->email_cli;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function getLocacoes() {
        return $this->locacoes;
    }

    public function setCpf_cli($cpf_cli) {
        $this->cpf_cli = $cpf_cli;
    }

    public function setNome_cli($nome_cli) {
        $this->nome_cli = $nome_cli;
    }

    public function setEnd_cli($end_cli) {
        $this->end_cli = $end_cli;
    }

    public function setTel_cli($tel_cli) {
        $this->tel_cli = $tel_cli;
    }

    public function setEmail_cli($email_cli) {
        $this->email_cli = $email_cli;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    public function setLocacoes($locacoes) {
        $this->locacoes = $locacoes;
    }


    function __toString() {
        return "CPF = $this->cpf_cli  EMAIL = $this->email_cli  ENDERECO = $this->end_cli  NOME = $this->nome_cli  TELEFONE = $this->tel_cli SITUACAO = $this->situacao LOCACOES = " . print_r($this->locacoes);
    }

    
}
