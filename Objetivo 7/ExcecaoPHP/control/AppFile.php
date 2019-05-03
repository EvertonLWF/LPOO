<?php


function abrir($file = null){
    if(!$file){
        throw new Exception("sem argumento", 1, null);
    }
    if(!file_exists($file)){
        throw new Exception("arquivo inexistente", 2, null);
    }
    if(!$retorno = file_get_contents($file)){
        throw new Exception("impossível ler o arquivo", 3, null);
    }
    
    return $retorno;
    
}//fim function

try{
    $arquivo = abrir(); //sem argumento
    //$arquivo = abrir("/home/vagner/teste.txt"); //arquivo inexistente
    //$arquivo = abrir("/home/vagner/[colocar um arquivo corrompido aqui]"); //impossível ler o arquivo
} catch (Exception $ex) {
    echo $ex->getFile() . ' # ' . $ex->getLine() . ' # ' . $ex->getMessage() . ' # ' . $ex->getCode();
}finally{
    echo "\nSempre executa o que estiver no finally.";
}
    
