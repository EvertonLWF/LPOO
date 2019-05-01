<?php

/**
 * Description of Veiculo
 *
 * @author vpsil
 */
abstract class Veiculo {
    private $numDeEixos;
    private $propulsao;
    private $marca;
    private $modelo;
    private $anoFabricacao;
    
    function __construct($numDeEixos, $propulsao, $marca, $modelo, $anoFabricacao) {
        $this->numDeEixos = $numDeEixos;
        $this->propulsao = $propulsao;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->anoFabricacao = $anoFabricacao;
    }
    
    function getNumDeEixos() {
        return $this->numDeEixos;
    }

    function getPropulsao() {
        return $this->propulsao;
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

    function setNumDeEixos($numDeEixos) {
        $this->numDeEixos = $numDeEixos;
    }

    function setPropulsao($propulsao) {
        $this->propulsao = $propulsao;
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
        return "Veiculo[Numero de Eixos=$this->numDeEixos, Propulsao=$this->propulsao, Marca=$this->marca, Modelo=$this->modelo, Ano de Fabricação=$this->anoFabricacao]";
    }
    
}
