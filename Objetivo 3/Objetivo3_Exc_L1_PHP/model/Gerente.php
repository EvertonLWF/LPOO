<?php

include_once "Funcionario.php";

/**
 * Description of Gerente
 *
 * @author vagner
 */
class Gerente extends Funcionario{
    /*
     * Onde você deve inserir as regras de negócio? Sem dúvidas, é no modelo. O controlador só deve gerenciar o fluxo entre a Model e a View.
     */
    public function getBonus() {
        return parent::getSalario() * 0.20;
    }
    
    public function __toString() {
        return "Gerente{" . parent::__toString() . "}";
    }


}
