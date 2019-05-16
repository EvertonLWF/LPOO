<?php

include_once "../pdo/ProdutoPDO.php";


$produtoPDO = new ProdutoPDO();
print_r ($produtoPDO->select());

$Produto = new Produto;
echo '/nInforme o nome:';
$Produto->getNome(readline());
echo 'n/Informe a descricao:';
$Produto->getDescricao(readline());
echo 'n/Informe o valor:';
$Produto->getValor(readline());
echo 'n/Informe a situacao:';
$Produto->getSituacao(readline());
echo 'n/Informe a quandidade:';
$Produto->getQuantidade(readline());

try {
    $produtoPDO->insert($Produto);
    echo 'Produto inserido com sucesso!!!!';
    
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
    echo 'Erro ao inserir Produto';
}