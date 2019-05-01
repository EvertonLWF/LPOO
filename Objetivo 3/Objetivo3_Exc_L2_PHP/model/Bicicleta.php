<?php

/**
 * Description of Bicleta
 *
 * @author vpsil
 */
class Bicleta extends Veiculo{
    private $tamanhoDaRoda;
    private $chassi;
    
    function __construct($numDeEixos, $propulsao, $marca, $modelo, $anoFabricacao, $tamanhoDaRoda, $chassi) {
        parent::__construct($numDeEixos, $propulsao, $marca, $modelo, $anoFabricacao);
        $this->tamanhoDaRoda = $tamanhoDaRoda;
        $this->chassi = $chassi;
    }
    
    function getTamanhoDaRoda() {
        return $this->tamanhoDaRoda;
    }

    function getChassi() {
        return $this->chassi;
    }

    function setTamanhoDaRoda($tamanhoDaRoda) {
        $this->tamanhoDaRoda = $tamanhoDaRoda;
    }

    function setChassi($chassi) {
        $this->chassi = $chassi;
    }

    public function __toString() {
        return "Bicicleta[Tamanho da Roda=$this->tamanhoDaRoda, Chassi=$this->chassi " . parent::__toString();
    }


}
