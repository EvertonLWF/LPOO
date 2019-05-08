<?php

try {
    $conn = new PDO('mysql: dbname=vendas; user=root; password="123"; host=localhost; port=3306');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //define para que o PDO lance exceções na ocorrência de erros
    print_r($conn);
    print_r($conn->getAvailableDrivers());
} catch (PDOException $ex) {
    echo $ex->getFile() . ' ### ' . $ex->getLine() . ' ### ' . $ex->getMessage() . ' ### ' . $ex->getCode();
} finally {
    echo "\nSempre executa o que estiver no finally.";
}


