<?php

include_once "../model/Carro.php";

//instanciou objetos da classe Carro
$objeto1 = new Carro(2019, "Uno", "Fiat");
echo "$objeto1\n"; //aqui utilizei o comportamento __toString() que eu defini na classe Carro (estou programando 100% OO)
print_r($objeto1); //aqui eu utilizei a função print_r para imprimir o objeto (estou programando procedural e OO) ... observe que em Java eu não tenho como fazer isso, pois ele é 100% OO.
$objeto2 = new Carro(2018, "Uno", "Fiat");
print_r($objeto2);
$objeto3 = new Carro(2017, "Uno", "Fiat");
print_r($objeto3);
$objeto4 = new Carro(2016, "Uno", "Fiat");
print_r($objeto4);
$objeto5 = new Carro(2015, "Uno", "Fiat");
print_r($objeto5);
