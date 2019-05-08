<?php

try {
    $pdo = new PDO('pgsql:dbname=vendas;user=postgres;password=root;host=localhost');
    $sqlInsercao = "INSERT INTO clientes VALUES(1,'Zé','zezé',1)";
    $sqlSelect =  'SELECT * FROM clientes';
    $sqlUpdate = "UPDATE clientes SET nome = 'Mignon' WHERE nome = 'Zé'";
    $sqlDelete = "DELETE FROM clientes";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //define para que o PDO lance exceções na ocorrência de erros
    print_r($pdo);
    print_r($pdo->getAvailableDrivers());
    
    //Inserção de dados
    //$pdo->query($sqlInsercao);
    
    /**listar dados
    $result = $pdo->query("SELECT * FROM clientes");
    $result = $result->fetchAll();
    
    foreach ($result as $key) {
        echo "Nome = ".$key['nome']." Sobrenome = ".$key['sobrenome'];
        
    }
    **/
    $pdo->query($sqlDelete);
    
} catch (PDOException $ex) {
    echo $ex->getFile() . ' ### ' . $ex->getLine() . ' ### ' . $ex->getMessage() . ' ### ' . $ex->getCode();
} finally {
    echo "\nSempre executa o que estiver no finally.";
}




