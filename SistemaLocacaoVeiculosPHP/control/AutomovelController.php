<?php

include_once "../pdo/AutomovelPDO.php";

include_once "../pdo/ModeloPDO.php";

include_once "../pdo/MarcaPDO.php";

include_once "../model/Automovel.php";


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AutomovelPDO
 *
 * @author feijo
 */
$marcaPD0 = new MarcaPDO();
$modeloPDO = new ModeloPDO();
$automovelPDO = new AutomovelPDO();


$modelo = $modeloPDO->findByModelo("fiesta");
$modelo = $modelo[0];

$automovel = new Automovel($modelo);
$automovel->setChassi("123321123321");
$automovel->setCor("preto");
$automovel->setKm(123);
$automovel->setModelo($modelo);
$automovel->setNroPortas(4);
$automovel->setPlaca("III1234");
$automovel->setRenavan(9876543210);
$automovel->setSituacao(true);
$automovel->setTipoCombustivel(1);
$automovel->setValorLocacao(150);
$automovelPDO = new AutomovelPDO();

//$automovelPDO->insert($automovel);
print_r($automovelPDO->findCarByCor("p"));

//print_r($automovel);