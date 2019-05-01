<?php

require_once 'Automovel.php';

/**
 * Description of Caminhao
 *
 * @author vpsil
 */
class Caminhao extends Veiculo implements Automovel{
    
    private $capacidadePortaMalas;
    private $renavam;
    private $chassi;
    private $placa;
    
    function __construct($numDeEixos, $propulsao, $marca, $modelo, $anoFabricacao, $capacidadePortaMalas, $renavam, $chassi, $placa) {
        parent::__construct($numDeEixos, $propulsao, $marca, $modelo, $anoFabricacao);
        $this->capacidadePortaMalas = $capacidadePortaMalas;
        $this->renavam = $renavam;
        $this->chassi = $chassi;
        $this->placa = $placa;
    }

    function getCapacidadePortaMalas() {
        return $this->capacidadePortaMalas;
    }

    function setCapacidadePortaMalas($capacidadePortaMalas) {
        $this->capacidadePortaMalas = $capacidadePortaMalas;
    }

        
    public function getChassi() {
        return $this->chassi;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function getRenavam() {
        return $this->renavam;
    }

    public function setChassi($chassi) {
        $this->chassi = $chassi;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    public function setRenavam($renavam) {
        $this->renavam = $renavam;
    }
    
    public function __toString() {
        return "Caminhão[Capacidade do porta malas=$this->capacidadePortaMalas, Renavam=$this->renavam, Chassi=$this->chassi, Placa=$this->placa] " . parent::__toString();
    }

}
