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
$marca->setMarca("Mercedes");
$marca->setSituacao(true);

$marca = serialize($marca);
$marca = unserialize($marca);
$modelo->setDescricao("Classe-A");
$modelo->setMarca($marca);
$modelo->setSituacao(TRUE);

echo $marca;
//$modeloPDO->insert($modelo);

//$res = $modeloPDO->findAll();

//foreach ($res as $key) {
//    echo $key;
//}
