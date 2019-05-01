<?php

/**
 * Description of Funcionario
 *
 * @author vagner
 */
abstract class Funcionario {
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

    public abstract function getBonus();
    
    public function __toString() {
        return "$this->nome, $this->salario";
    }
}
