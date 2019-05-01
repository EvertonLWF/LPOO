<?php

include_once '../model/Veiculo.php';
include_once '../model/Bicicleta.php';
include_once '../model/Carro.php';
include_once '../model/Caminhao.php';

$bicicleta = new Bicleta(2, "humana", "Caloi", "esportiva", 2018, 29, "YYY555555555");

echo "\n$bicicleta";

$carro = new Carro(2, "Álcool/gasolina", "Fiat", "Uno", 2018, 480, "0100200300", "DDD52525236", "III5544");

echo "\n$carro";

$caminhao = new Caminhao(3, "Diesel", "Merces Benz", "1313", 1990, 30, "1133233300", "TTT52525236", "IPP7722");

echo "\n$caminhao";