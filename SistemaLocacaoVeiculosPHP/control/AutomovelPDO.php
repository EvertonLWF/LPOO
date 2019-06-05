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

$marca = $marcaPD0->findByMarca("ford");
$modelo = $modeloPDO->findByModelo("ka");
$modelo[0]->setMarca($marca[0]->getMarca());

$automovel = new Automovel($modelo[0]->getDescricao());
$automovel->setChassi(123123123123);
$automovel->setCor("azul");
$automovel->setKm(100);
$automovel->setNroPortas(4);
$automovel->setPlaca("ABC1234");
$automovel->setRenavan(987654321);
$automovel->setSituacao(true);
$automovel->setTipoCombustivel(1);
$automovel->setValorLocacao(100);

//$automovelPDO->insert($automovel);
$res = $automovelPDO->findAll();

print_r($res);