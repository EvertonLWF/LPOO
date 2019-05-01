<?php

include_once "../model/ContaCorrente.php";
include_once "../model/ContaPoupanca.php";


$cp = new ContaPoupanca(); //cria um objeto da classe ContaPoupanca
$cp->deposita(500.00); //chama um comportamento definido na classe Conta
echo "\nSaldo após a abertura da conta poupança = " . $cp->getSaldo(); //chama um comportamento definido na classe Conta 

$cc = new ContaCorrente(); //cria um objeto da classe ContaPoupanca
$cc->deposita(100.00); //chama um comportamento definido na classe Conta
echo "\nSaldo após a abertura da conta corrente = " . $cc->getSaldo(); //chama um comportamento definido na classe Conta
$cc->saca(50.00); //chama um comportamento redefinido (sobreescrito) na classe ContaCorrente.
echo "\nSaldo após o saque da conta corrente = " . $cc->getSaldo(); //chama um comportamento definido na classe Conta

