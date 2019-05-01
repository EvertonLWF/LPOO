<?php

/*
 * Observe que em PHP não é necessário ter um comportamento main em uma classe.
 */

include "../model/Produto.php";

$produto1 = new Produto();
echo "\n$produto1"; //observe que o construtor padrão inicializa todos os atributos como uma string vazia (a linguagem não é tipada)
$produto1->setNome("Arroz");
$produto1->setDescricacao("Arroz polido tipo 1");
$produto1->setValor(9.80);
$produto1->setQuantidade(200);
echo "\n$produto1";

$produto2 = new Produto();
echo "\n$produto2"; //observe que o construtor padrão inicializa todos os atributos como uma string vazia (a linguagem não é tipada)
$produto2->setNome("Feijão");
$produto2->setDescricacao("Feijão preto tipo 1");
$produto2->setValor(7.20);
$produto2->setQuantidade(500);
echo "\n$produto2";

