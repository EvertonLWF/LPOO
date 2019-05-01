<?php

/**
 * Description of Funcionario
 *
 * @author vagner
 */
class Funcionario {
    private $nome;
    private $salario;
    
    public function __construct() {
        
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function getSalario() {
        return $this->salario;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
    }

    public function __toString() {
        return "Funcionario[nome=$this->nome, salario=$this->salario]";
    }
    
}
