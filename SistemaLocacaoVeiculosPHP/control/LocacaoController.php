<?php

include_once "../pdo/LocacaoPDO.php";

include_once "../model/Locacao.php";

include_once "../pdo/AutomovelPDO.php";

include_once "../pdo/ClientePDO.php";

include_once "../pdo/ModeloPDO.php";

include_once "../pdo/MarcaPDO.php";

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
class LocacaoControler {

    private $locacaoPDO;
    private $automovelPDO;
    private $clientePDO;
    private $modeloPDO;
    private $marcaPDO;

    function __construct() {
        $this->locacaoPDO = new LocacaoPDO;
        $this->automovelPDO = new AutomovelPDO;
        $this->clientePDO = new ClientePDO;
        $this->modeloPDO = new ModeloPDO();
        $this->marcaPDO = new MarcaPDO();
    }

    public function menuLocacao() {
        $exit = 1;

        while ($exit != 0) {
            echo "\r\n\n--------- Submenu Locacao ---------";
            echo "\n1. Inserir Locacao";
            echo "\n2. Alterar Locacao";
            echo "\n3. Excluir Locacao (soft delete)";
            echo "\n4. Listar todos as Locacao";
            echo "\n5. Listar Locacao pelo codigo";
            echo "\n6. Listar Locacao pela data";
            echo "\n7. Listar Locacao pelo cliente";
            echo "\n8. Listar Locacao pelo carro";
            echo "\n9. Reativar Locacao pelo codigo";
            echo "\nOpção (ZERO para sair): ";
            $exit = fgets(STDIN);
            switch ($exit) {
                case 0:
                    break;
                case 1:
                    $this->inserirLocacao();
                    break;
                case 2:
                    $this->alterarLocacao();
                    break;
                case 3:
                    $this->excluirLocacao();
                    break;
                case 4:
                    $this->listarTodasLocacao();
                    break;
                case 5:
                    $this->listarLocacaoPeloCodigo();
                    break;
                case 6:
                    $this->listarLocacaoPeloData();
                    break;
                case 7:
                    $this->listarLocacaoPeloCliente();
                    break;
                case 8:
                    $this->listarLocacaoPeloCarro();
                    break;
                case 9:
                    $this->reativarLocacaoByCodigo();
                    break;
                default:
                    echo "\nOpção inexistente.";
            }
        }
    }

    //insert (case 1)
    private function inserirLocacao() {

        A:

        echo"\nDigite a placa do veiculo: ";
        $placa = rtrim(fgets(STDIN));
        $letr = substr($placa, 0, 3);
        $num = substr($placa, 3, 7);
        if (strlen($placa) == 7) {
            if (preg_match("/^([a-z]+)$/i", $letr)) {
                if (preg_match("/^([0-9]+)$/i", $num)) {
                    $respPl = $this->automovelPDO->findCarByPlaca(rtrim($placa));
                    while (isset($respPl) && empty($respPl)) {
                        echo"\n Placa nao existe!!!";
                        goto A;
                    }
                    $auto = $this->automovelPDO->findCarByPlaca($placa);
                } else {
                    echo "\nVoce digitou letras no lugar de numeros!!!";
                    goto A;
                }
            } else {
                echo "\nVoce digitou numeros no lugar letras!!!";
                goto A;
            }
        } else {
            echo "\nA placa nao esta no formato correto!!!";
            goto A;
        }

        try {


            $modelo = $this->modeloPDO->findModeloById($auto[0]->getModelo()->getId_modelo());
            $marca = $this->marcaPDO->findMarcaById($modelo[0]->getMarca()->getId());
            $modelo[0]->setMarca($marca);
            $auto[0]->setModelo($modelo[0]);

            $consLoc = $this->locacaoPDO->findLocacaoByRenavan($auto[0]->getRenavan());

            while (isset($consLoc) && !empty($consLoc)) {
                echo"\nEste veiculo ja se encontra em uma locação: ";
                goto A;
            }
            print_r($auto[0]);
        } catch (Exception $exc) {
            echo "Placa inexistente!!!";
        }


        B:
        echo"\nInforme o CPF do Cliente: ";
        $cpf = rtrim(fgets(STDIN));
        if (strlen($cpf) == 11) {
            try {
                if (preg_match("/^([a-z-0-9]+)$/i", $cpf)) {
                    if (preg_match("/^([a-z]+)$/i", $cpf)) {
                        echo "\nFavor Verifique o CPF voce digitou somente letras!!!";
                        goto B;
                    } else {
                        if (preg_match("/^([0-9]+)$/i", $cpf)) {
                            $cli = $this->clientePDO->findClientByCpf($cpf);
                            if (isset($cli) && empty($cli)) {
                                echo "\nCliente nao existe!!";
                                goto B;
                            }

                            print_r($cli);
                        } else {
                            echo "\nFavor Verifique o CPF voce digitou numeros misturados com letras!!!";
                            goto B;
                        }
                    }
                } else {
                    echo "\nFavor Verifique o CPF !!!";
                    goto B;
                }
            } catch (SQLException $ex) {
                echo "\nFavor Verifique o CPF !!!";
                goto B;
            }
        } else {
            echo "\nFavor Verifique o CPF seram aceitos apenas 11 digitos!!!";
            goto B;
        }
        try {

            $locacao = new Locacao($cli[0]->getCpf_cli(), $auto[0]->getRenavan());
            $locacao->setAutomovel($auto[0]);
            $locacao->setCliente($cli[0]);
            $locacao->setDevolvido(false);
            $locacao->setKm($auto[0]->getKm());


            C:
            echo"\nDigite quantos dias para locacao do veiculo: ";
            $dias = (rtrim(fgets(STDIN)));
            if ($dias < 0) {
                echo "\nValores negativos não são aceitos !!!";
                goto C;
            }

            //valor locacao
            $vl_locacao = ($auto[0]->getValorLocacao()) * $dias;
            $locacao->setVl_locacao($vl_locacao);
            //valor caucao
            $vl_calcao = $vl_locacao * 0.3;
            $locacao->setVl_calcao($vl_calcao);

            //data e hora do sistema
            $date = DateTime::createFromFormat('U.u', microtime(TRUE));

            //id da locacao
            $locacao->setId_locacao(md5($date->format('Y-m-d H:i:s.u')));

            //data da locacao
            $locacao->setDt_locacao($date->format('Y-m-d'));

            //hora da locacao
            $locacao->setHora_locacao($date->format('H:i:s'));

            //hora da devolucao
            $locacao->setHora_devolucao($date->format('H:i:s'));

            //data de devolucao
            $locacao->setDt_devolucao(date('d-m-Y', strtotime("+$dias days")));

            // situacao da locacao inicia em true
            $locacao->setSituacao(true);
            $locacao->setDevolvido(0);

            print_r($locacao);
            echo "\nConfirmar a operação (s/n)? ";
            $operacao = rtrim(fgets(STDIN));

            if (!strcasecmp($operacao, "s")) {
                if ($this->locacaoPDO->insert($locacao)) {
                    echo "\nLocacao realizada.";
                } else {
                    echo "\nFalha ao realizar locacao.";
                }
            }
            if (!strcasecmp($operacao, "n")) {
                echo "\nOperação cancelada.";
            }
        } catch (SQLException $exc) {
            echo "Cliente inexistente!!! " . $exc;
        }
    }

    //update (case 2)
    private function alterarLocacao() {
        A:
        echo "\nDigite o codigo da locacao que você deseja alterar: ";
        $id = fgets(STDIN);
        try {
            $loc = $this->locacaoPDO->findByLocacao(rtrim($id));
            if (isset($loc) && empty($loc)) {
                echo "\n Esta locacao nao existe!!!";
                goto A;
            }
            $this->ConcAuto($loc);
        } catch (Exception $exc) {
            echo "\n Formato do ID incorreto verifique e tente novamente!!!";
            goto A;
        }

        B:
            
        echo"\nDigite 1 para : ".$loc[0]->getAutomovel()->getPlaca();
        echo"\nOu digite uma placa para outro veiculo: ";
        $placa = rtrim(fgets(STDIN));
        if($placa == 1){
            $auto = $this->automovelPDO->findCarByPlaca($loc[0]->getAutomovel()->getPlaca());
            goto C;
        }
        $letr = substr($placa, 0, 3);
        $num = substr($placa, 3, 7);
        if (strlen($placa) == 7) {
            if (preg_match("/^([a-z]+)$/i", $letr)) {
                if (preg_match("/^([0-9]+)$/i", $num)) {
                    $respPl = $this->automovelPDO->findCarByPlaca(rtrim($placa));
                    while (isset($respPl) && empty($respPl)) {
                        echo"\n Placa nao existe!!!";
                        goto B;
                    }
                    $auto = $this->automovelPDO->findCarByPlaca($placa);                  
                    $consLoc = $this->locacaoPDO->findLocacaoByRenavan($auto[0]->getRenavan());
                    if (isset($consLoc) && !empty($consLoc)) {
                        echo"\nEste veiculo ja se encontra em uma locação: ";
                        goto B;
                    }
                    $auto[0]->setModelo($modelo[0]);
                    $modelo = $this->modeloPDO->findByModelo($auto[0]->getModelo()->getDescricao());
                    print_r($auto[0]);
                    $loc[0]->setAutomovel($auto[0]);
                    $loc[0]->setKm($auto[0]->getKm());
                } else {
                    echo "\nVoce digitou letras no lugar de numeros!!!";
                    goto B;
                }
            } else {
                echo "\nVoce digitou numeros no lugar letras!!!";
                goto B;
            }
        } else {
            echo "\nA placa nao esta no formato correto!!!";
            goto B;
        }
        echo"\nDigite a placa do veiculo: ";





        C:
        echo"\nDigite 2 para : ".$loc[0]->getCliente()->getCpf_cli();
        echo"\nDigite a cpf do cliente: ";
        $cpf = rtrim(fgets(STDIN));
        if($cpf == 2){
            goto D;
        }
        try {
            $cliente = $this->clientePDO->findClientByCpf($cpf);
            while (isset($cliente) && empty($cliente)) {
                echo"\n Este cliente não existe!!!";
                echo"\nDigite a cpf do cliente: ";
                $cpf = fgets(STDIN);
                $cliente = $this->clientePDO->findClientByCpf(rtrim($cpf));
            }
            print_r($cliente[0]);
            $loc[0]->setCliente($cliente[0]);
        } catch (Exception $ex) {
            echo "\nVerifique o formato do cpf e tente novamente";
            goto B;
        }
        D:
        echo"\nDigite quantos dias para locacao do veiculo: ";

        $dias = (rtrim(fgets(STDIN)));
        while ($dias < 0) {
            echo "\nValores negativos não são aceitos !!!";
            goto D;
        }
        $dateIN = $loc[0]->getDt_locacao();
        $date = new DateTime($dateIN);
        $date->add(new DateInterval("P" . $dias . "D"));

        //data de devolucao
        $loc[0]->setDt_devolucao($date->format('Y-m-d'));

        //valor locacao
        $vl_locacao = ($auto[0]->getValorLocacao()) * $dias;
        $loc[0]->setVl_locacao($vl_locacao);
        //valor caucao
        $vl_calcao = $vl_locacao * 0.3;
        $loc[0]->setVl_calcao($vl_calcao);

        // situacao da locacao inicia em true
        $loc[0]->setSituacao(true);
        $loc[0]->setDevolvido(false);

        print_r($loc[0]);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->locacaoPDO->update($loc[0])) {
                echo "\nLocacao realizada.";
            } else {
                echo "\nFalha ao realizar locacao.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

    //update (case 3)
    private function excluirLocacao() {
        E:
        echo "\nDigite o codigo da locacao que você deseja tornar inativo: ";
        $id = fgets(STDIN);

        try {
            $loc = $this->locacaoPDO->findByLocacao(rtrim($id));
            while (isset($loc) && empty($loc)) {
                echo "\nNão existe locacao Ativa com este codigo!!!";
                goto E;
            }
            $this->ConcAuto($loc);
        } catch (Exception $exc) {
            echo "\nCodigo da locacao não esta no formato correto favor tentar em outro formato!!!";
        }
        echo "\nConfirmar a operação (s/n)?";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->locacaoPDO->deleteSoft($loc[0])) {
                echo "\nLocacao excluído.";
            } else {
                echo "\nFalha ao desativar locacao.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }
    //findAll ou SELECT sem filtros (case 4)
    private function listarTodasLocacao() {
        $loc = $this->locacaoPDO->findAll();

        if (empty($loc)) {
            echo "\nNão existem locacoes !!!";
        } else {
            $this->ConcAuto($loc);
        }
    }

    //find for name ou SELECT com filtros (case 5 6 7 8)
    private function listarLocacaoPeloCodigo() {
        echo "\nInforme o codigo da locacao a ser consultado: ";
        $id = fgets(STDIN);
        $loc = $this->locacaoPDO->findByLocacao(rtrim($id));

        if (isset($loc) && !empty($loc)) {
            $this->ConcAuto($loc);
        } else {
            echo "\nNão existe locação com este ID";
        }
    }

    private function listarLocacaoPeloData() {
        echo "\nInforme a data da locacao a ser consultado: ";
        $dt = rtrim(fgets(STDIN));
        try {
            $loc = $this->locacaoPDO->findLocacaoByDate($dt);
            if (isset($loc) && !empty($loc)) {
                $this->ConcAuto($loc);
            } else {
                echo "\nNão existe locação com esta data";
            }
        } catch (Exception $exc) {
            echo "\nA data não esta no formato correto, verifique e tente novamente !!!";
        }
    }

    private function listarLocacaoPeloCliente() {
        echo "\nInforme o cpf do cliente na locacao a ser consultado: ";
        $cpf = fgets(STDIN);
        try {
            $loc = $this->locacaoPDO->findLocacaoByCliente(rtrim($cpf));

            if (isset($loc) && !empty($loc)) {
                $this->ConcAuto($loc);
            } else {
                echo "\nNão existe locação com este cpf";
            }
        } catch (Exception $exc) {
            echo "\nO cpf não esta no formato correto, verifique e tente novamente !!!";
        }
    }

    private function listarLocacaoPeloCarro() {
        echo "\nInforme a placa do carro na locacao a ser consultado: ";
        $placa = fgets(STDIN);
        try {

            $renavan = $this->automovelPDO->findCarByPlaca(rtrim($placa));
            if (isset($renavan) && !empty($renavan)) {
                $loc = $this->locacaoPDO->findLocacaoByRenavan($renavan[0]->getRenavan());

                if (isset($loc) && !empty($loc)) {
                    $this->ConcAuto($loc);
                } else {
                    echo "\nNão existe locação com esta placa";
                }
            } else {
                echo "\nNão existe veiculo com esta placa";
            }
        } catch (Exception $exc) {
            echo "\nA placa não esta no formato correto, verifique e tente novamente !!!";
        }
    }

    //update (case 9)
    private function reativarLocacaoByCodigo() {
        F:
        echo "\nDigite o codigo da locacao que você deseja tornar ativo: ";
        $id = fgets(STDIN);

        try {
            $loc = $this->locacaoPDO->findByLocacaoR(rtrim($id));

            while (isset($loc) && empty($loc)) {
                echo "\nNão existe locacao Inativa com este codigo!!!";
                goto F;
            }
            $this->ConcAuto($loc);
        } catch (Exception $exc) {
            echo "\nCodigo da locacao não esta no formato correto favor tentar em outro formato!!!";
        }

        echo "\nConfirmar a operação (s/n)?";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->locacaoPDO->reactivateLocacao($loc[0])) {
                echo "\nLocacao reativada.";
            } else {
                echo "\nFalha ao reativar locacao.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

    private function ConcAuto($loc) {

        foreach ($loc as $key) {
            $cliente = $this->clientePDO->findClientByCpf($key->getCliente()->getCpf_cli());
            $veiculo = $this->automovelPDO->findCarByRenavan($key->getAutomovel()->getRenavan());
            $modelo = $this->modeloPDO->findModeloById($veiculo[0]->getModelo()->getId_modelo());
            $marca = $this->marcaPDO->findMarcaById($modelo[0]->getMarca()->getId());
            $modelo[0]->setMarca($marca);
            $veiculo[0]->setModelo($modelo[0]);
            $key->setcliente($cliente[0]);
            $key->setAutomovel($veiculo[0]);
            print_r($key);
        }
    }
}

//$locacaoController = new LocacaoControler;
//$locacaoController->menuLocacao();

