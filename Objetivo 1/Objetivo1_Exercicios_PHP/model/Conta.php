<?php

/**
 * Description of Conta
 *
 * @author vagner
 */
class Conta {
    private $saldo;
    
    public function __construct() {}
    
    public function getSaldo() {
        return $this->saldo;
    }

   
    public function deposita($valor){
        $this->saldo += $valor;
     }
    
    public function saca($valor){
        $this->saldo -= $valor;
    }
 
    
    public function atualiza($taxa){
        $this->saldo *= ($taxa/100);
    }

    public function __toString() {
        return "Conta[saldo=$this->saldo]";
    }

}
