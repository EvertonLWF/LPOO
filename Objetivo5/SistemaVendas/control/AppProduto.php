<?php

include_once "../pdo/ProdutoPDO.php";


$produtoPDO = new ProdutoPDO();
print_r ($produtoPDO->select());

//readline("");




