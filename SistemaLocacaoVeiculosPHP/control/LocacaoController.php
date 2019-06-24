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

        echo"\nDigite a placa do veiculo: ";
        $placa = fgets(STDIN);
        try {
            $auto = $this->automovelPDO->findCarByPlaca(rtrim($placa));
            $modelo = $this->modeloPDO->findByModelo($auto[0]->getModelo()->getDescricao());
            $auto[0]->setModelo($modelo[0]);
            while (isset($auto) && empty($auto)) {
                echo"\nEste veiculo não existe: ";
                echo"\nDigite a placa do veiculo: ";
                $placa = fgets(STDIN);
                $auto = $this->automovelPDO->findCarByPlaca(rtrim($placa));
            }
            $consLoc = $this->locacaoPDO->findLocacaoByRenavan($auto[0]->getRenavan());

            //while (isset($consLoc) && !empty($consLoc)) {
            //    echo"\nEste veiculo ja se encontra em uma locação: ";
            //    echo"\nDigite a placa de outro veiculo: ";
            //    $placa = fgets(STDIN);
            //   $auto = $automovelPDO->findCarByPlaca(rtrim($placa));
            //}
        } catch (Exception $exc) {
            echo "Placa inexistente!!!";
        }
        print_r($auto[0]);
        echo"\nDigite a cpf do cliente: ";
        $cpf = fgets(STDIN);

        try {
            $cliente = $this->clientePDO->findClientByCpf(rtrim($cpf));
            while (isset($cliente) && empty($cliente)) {
                echo"\n Esta cliente não existe!!!";
                echo"\nDigite a cpf do cliente: ";
                $cpf = fgets(STDIN);
                $cliente = $this->clientePDO->findClientByCpf(rtrim($cpf));
            }

            print_r($cliente[0]);

            $locacao = new Locacao($cliente[0]->getCpf_cli(), $auto[0]->getRenavan());
            $locacao->setAutomovel($auto[0]);
            $locacao->setCliente($cliente[0]);
            $locacao->setDevolvido(false);
            $locacao->setKm($auto[0]->getKm());

            echo"\nDigite quantos dias para locacao do veiculo: ";
            $dias = (rtrim(fgets(STDIN)));
            while ($dias < 0) {
                echo "\nValores negativos não são aceitos !!!";
                echo"\nDigite quantos dias para locacao do veiculo: ";
                $dias = (rtrim(fgets(STDIN)));
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
            echo "Cliente inexistente!!! ".$exc;
        }
    }

    //update (case 2)
    private function alterarLocacao() {
        A:
        echo "\nDigite o codigo da locacao que você deseja alterar: ";
        $id = fgets(STDIN);
        try {
            $loc = $this->locacaoPDO->findByLocacao(rtrim($id));
            $index = 0;
            foreach ($loc as $key) {
                $cliente = $this->clientePDO->findClientByCpf($key->getCliente()->getCpf_cli());
                $loc[$index]->setcliente($cliente[0]);
                $veiculo = $this->automovelPDO->findCarByRenavan($key->getAutomovel()->getRenavan());
                $modelo = $this->modeloPDO->findByModelo($veiculo[0]->getModelo()->getDescricao());
                $veiculo[0]->setModelo($modelo);
                $loc[$index]->setAutomovel($veiculo[0]);
                $index++;
            }
            if (isset($loc) && !empty($loc)) {
                print_r($loc[0]);
            } else {
                while (isset($loc) && empty($loc)) {
                    echo "\n ID da locacao inexistente";
                    echo "\nDigite o codigo da locacao que você deseja alterar: ";
                    $id = fgets(STDIN);
                    $loc = $this->locacaoPDO->findByLocacao(rtrim($id));
                }
            }
        } catch (Exception $exc) {
            echo "\n Formato do ID incorreto verifique e tente novamente!!!";
            goto A;
        }

        D:
        echo"\nDigite a placa do veiculo: ";
        $placa = fgets(STDIN);
        try {
            $auto = $this->automovelPDO->findCarByPlaca(rtrim($placa));
            while (isset($auto) && empty($auto)) {
                echo"\neste veiculo não existe: ";
                echo"\nDigite a placa do veiculo: ";
                $placa = fgets(STDIN);
                $auto = $this->automovelPDO->findCarByPlaca(rtrim($placa));
            }
            $modelo = $this->modeloPDO->findByModelo($auto[0]->getModelo()->getDescricao());
            $auto[0]->setModelo($modelo[0]);
            print_r($auto[0]);
            $loc[0]->setAutomovel($auto[0]);
            $loc[0]->setKm($auto[0]->getKm());
        } catch (Exception $ex) {
            echo "\n Formato da placa esta incorreto, verifique e tente novamente!!!";
            goto D;
        }



        B:
        echo"\nDigite a cpf do cliente: ";
        $cpf = fgets(STDIN);

        try {
            $cliente = $this->clientePDO->findClientByCpf(rtrim($cpf));
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
        C:
        echo"\nDigite quantos dias para locacao do veiculo: ";

        $dias = (rtrim(fgets(STDIN)));
        while ($dias < 0) {
            echo "\nValores negativos não são aceitos !!!";
            goto C;
        }
        //data e hora do sistema
        //$date = DateTime::createFromFormat('U.u', microtime(TRUE));
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

            print_r($loc[0]);
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
        $index = 0;
        foreach ($loc as $key) {
            $cliente = $this->clientePDO->findClientByCpf($key->getCliente()->getCpf_cli());
            $loc[$index]->setcliente($cliente[0]);
            $veiculo = $this->automovelPDO->findCarByRenavan($key->getAutomovel()->getRenavan());
            $modelo = $this->modeloPDO->findByModelo($veiculo[0]->getModelo()->getDescricao());
            $veiculo[0]->setModelo($modelo);
            $loc[$index]->setAutomovel($veiculo[0]);
            $index++;
        }
        if (empty($loc)) {
            echo "\nNão existem locacoes !!!";
        } else {
            print_r($loc);
        }
    }

    //find for name ou SELECT com filtros (case 5 6 7 8)
    public function listarLocacaoPeloCodigo() {
        echo "\nInforme o codigo da locacao a ser consultado: ";
        $id = fgets(STDIN);
        $loc = $this->locacaoPDO->findByLocacao(rtrim($id));
        $cliente = $this->clientePDO->findClientByCpf($loc->getCliente()->getCpf_cli());
        $loc->setcliente($cliente[0]);
        $veiculo = $this->automovelPDO->findCarByRenavan($loc->getAutomovel()->getRenavan());
        $modelo = $this->modeloPDO->findByModelo($veiculo[0]->getModelo()->getDescricao());
        $veiculo[0]->setModelo($modelo);
        $loc->setAutomovel($veiculo[0]);
        if (isset($loc) && !empty($loc)) {
            print_r($loc);
        } else {
            echo "\nNão existe locação com este ID";
        }
    }

    private function listarLocacaoPeloData() {
        echo "\nInforme a data da locacao a ser consultado: ";
        $dt = fgets(STDIN);
        try {
            $loc = $this->locacaoPDO->findLocacaoByDate(rtrim($dt));
            $index = 0;
            foreach ($loc as $key) {
                $cliente = $this->clientePDO->findClientByCpf($key->getCliente()->getCpf_cli());
                $loc[$index]->setcliente($cliente[0]);
                $veiculo = $this->automovelPDO->findCarByRenavan($key->getAutomovel()->getRenavan());
                $modelo = $this->modeloPDO->findByModelo($veiculo[0]->getModelo()->getDescricao());
                $veiculo[0]->setModelo($modelo);
                $loc[$index]->setAutomovel($veiculo[0]);
                $index++;
            }
            if (isset($loc) && !empty($loc)) {
                print_r($loc);
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
            $index = 0;
            foreach ($loc as $key) {
                $cliente = $this->clientePDO->findClientByCpf($key->getCliente()->getCpf_cli());
                $loc[$index]->setcliente($cliente[0]);
                $veiculo = $this->automovelPDO->findCarByRenavan($key->getAutomovel()->getRenavan());
                $modelo = $this->modeloPDO->findByModelo($veiculo[0]->getModelo()->getDescricao());
                $veiculo[0]->setModelo($modelo);
                $loc[$index]->setAutomovel($veiculo[0]);
                $index++;
            }
            if (isset($loc) && !empty($loc)) {
                print_r($loc);
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
                $index = 0;
                foreach ($loc as $key) {
                    $cliente = $this->clientePDO->findClientByCpf($key->getCliente()->getCpf_cli());
                    $loc[$index]->setcliente($cliente[0]);
                    $veiculo = $this->automovelPDO->findCarByRenavan($key->getAutomovel()->getRenavan());
                    $modelo = $this->modeloPDO->findByModelo($veiculo[0]->getModelo()->getDescricao());
                    $veiculo[0]->setModelo($modelo);
                    $loc[$index]->setAutomovel($veiculo[0]);
                    $index++;
                }
                if (isset($loc) && !empty($loc)) {
                    print_r($loc);
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

            print_r($loc[0]);
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

}

//$locacaoController = new LocacaoControler;
//$locacaoController->menuLocacao();

