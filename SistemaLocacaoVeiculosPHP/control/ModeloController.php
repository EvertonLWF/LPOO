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
$marca = new Marca();
$modelo = new Modelo($marca);

$marca->setMarca("Ford");
$marca->setSituacao(true);

$modelo->setDescricao("Fiesta");
$modelo->setMarca("Ford");
$modelo->setSituacao(TRUE);

//$modeloPDO->insert($modelo);

$res = $modeloPDO->findAll();

print_r($res);