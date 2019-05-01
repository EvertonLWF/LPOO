<?php

/*
 * Observe que em PHP não é necessário ter um comportamento main em uma classe.
 */

include "../model/Carro.php";

$carro1 = new Carro();
echo "\n$carro1"; //observe que o construtor padrão inicializa todos os atributos como uma string vazia (a linguagem não é tipada)
$carro1->setMarca("Volksvagem");
$carro1->setModelo("Fox");
$carro1->setAnoFabricacao(2012);
echo "\n$carro1";

$carro2 = new Carro();
echo "\n$carro2"; //observe que o construtor padrão inicializa todos os atributos como uma string vazia (a linguagem não é tipada)
$carro2->setMarca("Fiat");
$carro2->setModelo("Uno");
$carro2->setAnoFabricacao(2015);
echo "\n$carro2";

