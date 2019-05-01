<?php

include_once "Conta.php";

/**
 * Description of ContaCorrente
 *
 * @author vagner
 */
class ContaCorrente extends Conta {
    
    public function saca($valor) {
        if($this->saldo >= $valor){ 
            $this->saldo = $valor;
        }
    }
  
}
