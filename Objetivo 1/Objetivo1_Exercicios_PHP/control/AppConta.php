<?php

/*
 * Observe que em PHP não é necessário ter um comportamento main em uma classe.
 */

include "../model/Conta.php";

$conta1 = new Conta();
echo "\n$conta1"; //observe que o construtor padrão inicializa todos os atributos como uma string vazia (a linguagem não é tipada)
$conta1->deposita(1000.00);
echo "\n$conta1";

$conta2 = new Conta();
$conta2->deposita(2000.00);
echo "\n$conta2"; //observe que o construtor padrão inicializa todos os atributos como uma string vazia (a linguagem não é tipada)
$conta2->saca(200.00);
echo "\n$conta2";

