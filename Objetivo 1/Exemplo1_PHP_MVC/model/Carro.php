<?php

/**
 * Description of Carro
 *
 * @author vpsil
 */
class Carro {
    //atributos
    public $ano;
    public $modelo;
    public $marca;
    
    //construtor de objetos
    public function __construct($ano, $modelo, $marca) {
        $this->ano = $ano;
        $this->modelo = $modelo;
        $this->marca = $marca;
    }
    
    public function __toString() {
        return "Carro[marca=$this->marca, modelo=$this->modelo, marca=$this->marca]";
    }
}
