<?php

/**
 * Description of Conta
 *
 * @author vagner
 */
abstract class Conta {
    protected $saldo = 0.0;

    public function __construct(){}
     
    public function getSaldo(){
        return $this->saldo;
    }
    
    public function deposita($valor){
        $this->saldo += $valor;
    }
    
    public function saca($valor){ //esse comportamento foi sobrescrito (redefinido) na classe ContaCorrente.
        $this->saldo -= $valor;
    }
 
    
    public function atualiza($taxa){
        $this->saldo *= ($taxa/100);
    }

    public function __toString() {
        return "Conta[saldo=$this->saldo]";
    }
}
