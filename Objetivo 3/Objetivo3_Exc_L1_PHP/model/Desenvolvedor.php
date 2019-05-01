<?php

include_once "Funcionario.php";

/**
 * Description of Desenvolvedor
 *
 * @author vagner
 */
class Desenvolvedor extends Funcionario{
    
    /*
     * Onde você deve inserir as regras de negócio? Sem dúvidas, é no modelo. O controlador só deve gerenciar o fluxo entre a Model e a View.
     */
    public function getBonus() {
        return parent::getSalario() * 0.05;
    }
    
    public function __toString() {
        return "Desenvolvedor{" . parent::__toString() . "}";
    }

}
