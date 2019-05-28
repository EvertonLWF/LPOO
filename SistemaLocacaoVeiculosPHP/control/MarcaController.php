<?php

include_once "../pdo/MarcaPDO.php";

include_once "../model/Marca.php";


$marcaPDO = new MarcaPDO();

$resp = $marcaPDO->findAll();
//$resp = $marcaPDO->findByMarca("F");

print_r($resp);