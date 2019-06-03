<?php

include_once "../pdo/MarcaPDO.php";

include_once "../model/Marca.php";


$marcaPDO = new MarcaPDO();

$marca = new Marca();
$res = $marcaPDO->findAll();
//$marca->getMarca() = 

//$resp = $marcaPDO->findByMarca("F");

echo $res[0]->getMarca();
