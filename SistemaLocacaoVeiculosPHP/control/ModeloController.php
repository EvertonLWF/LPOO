<?php

include_once "../model/Marca.php";

include_once "../pdo/ModeloPDO.php";

include_once "../model/Modelo.php";


/**
 * Description of ModeloController
 *
 * @author feijo
 */

$modeloPDO = new ModeloPDO();
$modelo = new Modelo();
$marca = new Marca();

$marca->setMarca("Ford");
$marca->setSituacao(true);

$modelo->setDescricao("Fiesta");
$modelo->setMarca("Ford");
$modelo->setSituacao(TRUE);

$modeloPDO->insert($modelo);

$res = $modeloPDO->findAll();

//foreach ($res as $key) {
//    echo $key;
//}

print_r($res);