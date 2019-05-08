<?php

/**
 * Descreva aqui a classe Objeto.
 *
 * @author vagner
 */
class Objeto {
    private $atributoA;
    private $atributoB;
    
    function __construct($atributoA, $atributoB) {
        $this->atributoA = $atributoA;
        $this->atributoB = $atributoB;
    }

    public function getAtributoA() {
        return $this->atributoA;
    }

    public function getAtributoB() {
        return $this->atributoB;
    }

    public function setAtributoA($atributoA) {
        $this->atributoA = $atributoA;
    }

    public function setAtributoB($atributoB) {
        $this->atributoB = $atributoB;
    }

    public function __toString() {
        return "\nObjeto[Atributo A: " . $this->atributoA . " Atributo B: " . $this->atributoB . "]";
    }

}
