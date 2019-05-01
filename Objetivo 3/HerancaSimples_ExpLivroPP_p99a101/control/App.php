<?php

include_once "../model/ContaPoupanca.php";
include_once "../model/ContaCorrente.php";

//include_once "../model/Conta.php";

//ao colocar o modificador abstract na assinatura da classe conta a criação de instâncias fica impedida.
//$conta = new Conta("5428-3", "22554-8", "08/03/2019", "Maria das Graças", "qsenha1", 1000.00, TRUE);
//echo "\n$conta";

$contaCorrente = new ContaCorrente("5428-3", "22554-8", "08/03/2019", "Maria das Graças", "qsenha1", 1000.00, TRUE, 5000.00);
echo "\n$contaCorrente";
if($contaCorrente->sacar(2000.00)){
    echo"\nSaque realizado em conta corrente. Saldo atual = " . $contaCorrente->getSaldo();
    echo "\n$contaCorrente";
}else{
    echo"\nExcedeu o limite.";
}

$contaPoupanca = new ContaPoupanca("1234-3", "1234-8", "08/03/2019", "João de Deus", "qsenha2", 500.00, TRUE, "08/03/2019");
echo "\n$contaPoupanca";
if($contaPoupanca->sacar(450.00)){
    echo"\nSaque realizado em conta poupança. Saldo atual = " . $contaPoupanca->getSaldo();
    echo "\n$contaPoupanca";
}else{
    echo"\nExcedeu o saldo.";
}