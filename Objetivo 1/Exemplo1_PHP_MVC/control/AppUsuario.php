<?php

include_once "../model/Usuario.php";

//instanciou objetos da classe Usuario
$objeto1 = new Usuario("João", "de Deus", "email_joao@dominio.com", "senha1");
echo "$objeto1\n"; //aqui utilizei o comportamento __toString() que eu defini na classe Carro (estou programando 100% OO)
print_r($objeto1); //aqui eu utilizei a função print_r para imprimir o objeto (estou programando procedural e OO) ... observe que em Java eu não tenho como fazer isso, pois ele é 100% OO.
$objeto2 = new Usuario("Maria", "da Cruz", "email_maria@dominio.com", "senha2");
print_r($objeto2);
$objeto3 = new Usuario("José", "dos Santos", "email_jose@dominio.com", "senha3");
print_r($objeto3);
$objeto4 = new Usuario("Adão", "Silva", "email_adao@dominio.com", "senha4");
print_r($objeto4);
$objeto5 = new Usuario("Miguel", "dos Santos", "email_miguel@dominio.com", "senha5");
print_r($objeto5);

