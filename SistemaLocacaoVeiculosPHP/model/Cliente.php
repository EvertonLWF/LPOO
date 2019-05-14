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

    private $cpf_cli;
    private $nome_cli;
    private $end_cli;
    private $tel_cli;
    private $email_cli;

    function __construct($cpf_cli, $nome_cli, $end_cli, $tel_cli, $email_cli) {
        $this->cpf_cli = $cpf_cli;
        $this->nome_cli = $nome_cli;
        $this->end_cli = $end_cli;
        $this->tel_cli = $tel_cli;
        $this->email_cli = $email_cli;
    }
    function getCpf_cli() {
        return $this->cpf_cli;
    }

    function getNome_cli() {
        return $this->nome_cli;
    }

    function getEnd_cli() {
        return $this->end_cli;
    }

    function getTel_cli() {
        return $this->tel_cli;
    }

    function getEmail_cli() {
        return $this->email_cli;
    }

    function setCpf_cli($cpf_cli) {
        $this->cpf_cli = $cpf_cli;
    }

    function setNome_cli($nome_cli) {
        $this->nome_cli = $nome_cli;
    }

    function setEnd_cli($end_cli) {
        $this->end_cli = $end_cli;
    }

    function setTel_cli($tel_cli) {
        $this->tel_cli = $tel_cli;
    }

    function setEmail_cli($email_cli) {
        $this->email_cli = $email_cli;
    }

    function __toString() {
        return "CPF = $this->cpf_cli; EMAIL = $this->email_cli; ENDERECO = $this->end_cli; NOME = $this->nome_cli; TELEFONE = $this->tel_cli";
    }

    
}
