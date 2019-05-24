<?php

include_once "../pdo/ModeloPDO.php";

include_once "../model/Modelo.php";


/**
 * Description of ModeloController
 *
 * @author feijo
 */

$modeloPDO = new ModeloPDO();

$modelo = new Modelo();
$modelo->setDescricao("Fiorino");
$modelo->setMarca("Fiat");
$modelo->setSituacao(TRUE);

//$insert = $modeloPDO->insert($modelo);



$res = $modeloPDO->findAll();

foreach ($res as $key) {
    echo $key;
}
