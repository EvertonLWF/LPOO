<?php

include_once "../pdo/ModeloPDO.php";

include_once "../pdo/MarcaPDO.php";

include_once "../model/Marca.php";


$marcaPDO = new MarcaPDO();

$res = $marcaPDO->findByModelos("ford");
//$marca->getMarca() = 

//$resp = $marcaPDO->findByMarca("F");

print_r($res);
