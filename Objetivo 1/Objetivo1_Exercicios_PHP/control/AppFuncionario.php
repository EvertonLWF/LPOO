<?php

/*
 * Observe que em PHP não é necessário ter um comportamento main em uma classe.
 */

include "../model/Funcionario.php";

$funcionario1 = new Funcionario();
echo "\n$funcionario1"; //observe que o construtor padrão inicializa todos os atributos como uma string vazia (a linguagem não é tipada)
$funcionario1->getNome("João dos Santos");
$funcionario1->setSalario(2000.00);
echo "\n$funcionario1";

$funcionario2 = new Funcionario();
echo "\n$funcionario2"; //observe que o construtor padrão inicializa todos os atributos como uma string vazia (a linguagem não é tipada)
$funcionario2->getNome("Maria Silva");
$funcionario2->setSalario(2600.00);
echo "\n$funcionario2";

