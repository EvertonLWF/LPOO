<?php

include_once "../pdo/MarcaPDO.php";

include_once "Marca.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Modelo
 *
 * @author feijo
 */
class Modelo{
    private $descricao;
    private $marca;
    private $situacao;
    function __construct() {
        
    }
    function getDescricao() {
        return $this->descricao;
    }

    function getMarca() {
        return $this->marca;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setMarca($marca) {
        $MarcaPDO = new MarcaPDO();
        $res = $MarcaPDO->findByMarca($marca);
        if(isset($res) != null && !empty($res)){
            $this->marca = $res[0]->marca;
        }else{
            echo  "Esta marca não existe ou esta Inativa!";
        }
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

        
    function __toString() {
        return "DESCRICAO = $this->descricao MARCA = ".$this->marca[0]->marca ." SITUACAO = $this->situacao \n";
    }
    
}
