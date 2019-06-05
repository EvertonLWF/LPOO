<?php

include_once "../pdo/ModeloPDO.php";

include_once "../pdo/MarcaPDO.php";

include_once "../model/Marca.php";


$marcaPDO = new MarcaPDO();
$marca  = new Marca();
$res = $marcaPDO->findAll();
$marca  = $res[0];
$modelos = $marcaPDO->findByModelos("ford");
//$marca->getMarca() = 
$marca->setModelos($modelos);
//$resp = $marcaPDO->findByMarca("F");

print_r($marca);
