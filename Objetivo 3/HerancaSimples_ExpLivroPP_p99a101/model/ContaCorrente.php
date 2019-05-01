<?php

include_once "Conta.php";

/**
 * Description of ContaCorrente
 *
 * @author vagner
 */
class ContaCorrente extends Conta{
    private $limite;
    
    public function __construct($agencia, $codigo, $dataDeCriacao, $titular, $senha, $saldo, $estado, $limite) {
        parent::__construct($agencia, $codigo, $dataDeCriacao, $titular, $senha, $saldo, $estado);
        $this->limite = $limite;
    }

    
    public function sacar($valor) {
        if( (parent::getSaldo() + $this->limite) >= $valor){
            parent::sacar($valor);
            return true;
        }else{
            return false;
        }
    }
    
    public function getLimite() {
        return $this->limite;
    }

    public function setLimite($limite) {
        $this->limite = $limite;
    }

    public function __toString() {
        return "ContaCorrente[" . parent::__toString() . " aniversario=$this->limite]"; 
    }

}
