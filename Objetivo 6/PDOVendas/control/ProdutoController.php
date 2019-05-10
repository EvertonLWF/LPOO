<?php

include "../pdo/ProdutoPDO.php";

$produtoPDO = new ProdutoPDO();
print_r($produtoPDO->findAll());

