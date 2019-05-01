<?php

include_once "../model/Gerente.php";

include_once "../model/Desenvolvedor.php";

include_once "../model/Funcionario.php";

/*
 * Por que emite tal erro? Como a classe Funcionario foi marcada como "abstract", não é possível criar instâncias dessa classe, logo, o comando abaixo
 * recebe um erro da IDE "A classe abstrata Funcionario não pode ser instaciada. Retire o comentário para ler essa mensagem da IDE.
 * Como solucionar esse problema? Poderia se pensar em retirar o modificador "abstract" da assinatura da classe. Isso resolveria o problema. 
 * Mas, como não queremos manipular objetos da classe Funcionario, nos protegemos como programador e mantemos o "abstract". Assim ficamos
 * impedidos de acidentalmente manipular objetos que não nos interesssam na aplicação. 
 */
//$fsuncionario = new Funcionario();

$desenvolvedor = new Desenvolvedor();
$desenvolvedor->setNome("Maria Silva");
$desenvolvedor->setSalario(2000.00);
imprimir($desenvolvedor);
imprimir($desenvolvedor->getBonus());
$gerente = new Gerente();
$gerente->setNome("Teresa Santos");
$gerente->setSalario(5000.00);
imprimir($gerente);
imprimir($gerente->getBonus());


//encapsulou a impressão no console
//na aula eu comentei que posso "encapsular" em um método (ou função, como nesse exemplo) código que se repete.
function imprimir($objeto){
    echo "\n$objeto";
}

