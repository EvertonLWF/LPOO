<?php


class Carro {
    private $marca;
    private $modelo;
    private $anoFabricacao;
    
    //se optou por utilizar apenas construtor padrão (visto que, PHP não permite sobrecarga de métodos)
    public function __construct() {
        
    }
    
    function getMarca() {
        return $this->marca;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getAnoFabricacao() {
        return $this->anoFabricacao;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setAnoFabricacao($anoFabricacao) {
        $this->anoFabricacao = $anoFabricacao;
    }
    
    public function __toString() {
        return "Carro[marca=$this->marca, modelo=$this->modelo, ano de fabricação=$this->anoFabricacao]";
    }

}
