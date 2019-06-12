<?php

include_once "../pdo/LocacaoPDO.php";

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
$locacaoPDO = new LocacaoPDO();
$cliente = $clientePDO->findByClient("zé");
$automovel = $automovelPDO->findCarByModelo("f");
$dias = 10;
$valorLocacao = $dias*$automovel[0]->getValorlocacao();
$valorCalcao = $valorLocacao*0.3;

$locacao = new Locacao($cliente[0], $automovel[0]);
$locacao->setDevolvido(0);
$locacao->setHora_devolucao(date('H:i:s'));
$locacao->setDt_devolucao(date('d-m-Y',  strtotime("+$dias days")));
$locacao->setKm($automovel[0]->getKm());
$locacao->setVl_calcao($valorCalcao);
$locacao->setVl_locacao($valorLocacao);
$locacao->setSituacao(TRUE);

//$locacaoPDO->insert($locacao);
$loc = $locacaoPDO->findLocacaoByDate('12-06-2019');

print_r($loc);
