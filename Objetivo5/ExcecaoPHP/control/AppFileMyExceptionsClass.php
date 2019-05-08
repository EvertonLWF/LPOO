<?php

function abrir($file = null){
    if(!$file){
        throw new ParameterException("sem argumento", 1, null);
    }
    if(!file_exists($file)){
        throw new FileNotFoundException("arquivo inexistente", 2, null);
    }
    if(!$retorno = file_get_contents($file)){
        throw new FilePermissionException("impossível ler o arquivo", 3, null);
    }
    
    return $retorno;
    
}//fim function

//definição da subclasses de Exception
class ParameterException extends Exception{}
class FileNotFoundException extends Exception{}
class FilePermissionException extends Exception{}

try{
    //$arquivo = abrir(); //sem argumento (ParameterException)
    $arquivo = abrir("/home/vagner/teste.txt"); //arquivo inexistente (FileNotFoundException)
    //$arquivo = abrir("/tmp/texte.txt"); //impossível ler o arquivo (FilePermissionException)
} catch (ParameterException $ex) { //Mudar o tipo para ver o efeito
    echo $ex->getFile() . ' ### ' . $ex->getLine() . ' ### ' . $ex->getMessage() . ' ### ' . $ex->getCode(); //. ' ### ' . print_r($ex->getTrace());
} catch (FileNotFoundException $ex) { //Mudar o tipo para ver o efeito
    echo $ex->getFile() . ' ### ' . $ex->getLine() . ' ### ' . $ex->getMessage() . ' ### ' . $ex->getCode(); // . ' ### ' . print_r($ex->getTrace());
} catch (FilePermissionException $ex) { //Mudar o tipo para ver o efeito
    echo $ex->getFile() . ' ### ' . $ex->getLine() . ' ### ' . $ex->getMessage() . ' ### ' . $ex->getCode(); // . ' ### ' . print_r($ex->getTrace());
}finally{
    echo "\nSempre executa o que estiver no finally.";
}

