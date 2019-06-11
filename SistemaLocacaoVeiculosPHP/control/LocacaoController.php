<?php

include_once "../model/Locacao.php";

include_once "../pdo/AutomovelPDO.php";

include_once "../pdo/ClientePDO.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LocacaoController
 *
 * @author feijo
 */
$clientePDO = new ClientePDO();
$automovelPDO = new AutomovelPDO();

$cliente = $clientePDO->findByClient("zé");
//$automovel = $automovelPDO->findCarByMarca("")
print_r($cliente[0]);
