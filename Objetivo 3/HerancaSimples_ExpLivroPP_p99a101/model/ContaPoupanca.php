<?php

include_once "Conta.php";

/**
 * Description of ContaPoupanca
 *
 * @author vagner
 */
class ContaPoupanca extends Conta{
    private $aniversario;
    
    public function __construct($agencia, $codigo, $dataDeCriacao, $titular, $senha, $saldo, $estado, $aniversario) {
        parent::__construct($agencia, $codigo, $dataDeCriacao, $titular, $senha, $saldo, $estado);
        $this->aniversario = $aniversario;
    }

    
    public function sacar($valor) {
        if(parent::getSaldo() >= $valor){
            parent::sacar($valor);
            return true;
        }else{
            return false;
        }   
    }

    public function getAniversario() {
        return $this->aniversario;
    }

    public function setAniversario($aniversario) {
        $this->aniversario = $aniversario;
    }

    public function __toString() {
        return "ContaPoupanca[" . parent::__toString() . " aniversario=$this->aniversario]"; 
    }

}
