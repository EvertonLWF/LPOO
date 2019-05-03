<?php

//include "../model/Objeto.php";

try{   
    //divisão por zero
    $numerador = 10;
    $denominador = 0;
    $divisao = $numerador / $denominador;
    
    //falta do include de outro arquivo
//    $obj1 = new Objeto("atributo A", "Atributo B");
//    echo "$obj1";
    
} catch (Exception $ex) {
    echo "\nEntrou no catch.";
    echo $ex->getFile() . ' # ' . $ex->getLine() . ' # ' . $ex->getMessage() . ' # ' . $ex->getCode();
}  finally {
    echo "\n\nSempre executa as intruções que estiverem no finally.";
}