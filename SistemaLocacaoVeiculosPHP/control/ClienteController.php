<?php

include_once "../pdo/ClientePDO.php";

include_once "../model/Cliente.php";

/**
 * Description of ClienteController
 *
 * @author feijo
 */
$cliente = new Cliente();
$cliente->setCpf_cli(1703055039);
$cliente->setEmail_cli("cliente@cliente.com");
$cliente->setEnd_cli("Rua A");
$cliente->setNome_cli("Zé");
$cliente->setSituacao_cli(true);
$cliente->setTel_cli(5399887766);


$clientePDO = new ClientePDO();
$resp = $clientePDO->findAll();
//$res = $clientePDO->insert($cliente);
print_r($resp);

