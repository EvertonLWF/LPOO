<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContaEmpresarial
 *
 * @author feijo
 */
class ContaEmpresarial extends Conta{
    private $limite = 30000;
    
    public function getLimite() {
        return $this->limite;
    }

    public function setLimite($limite) {
        $this->limite = $limite;
    }

        
    public function saca($saca) {
        if($saldo >= $saca){
            $saldo-=$saca;
        }else{
            if(($saldo+$Limite)>=$saca){
                $saldo-=$saca;
                $Limite += $saldo;
            }
        }
    }
}