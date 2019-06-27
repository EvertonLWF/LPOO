<?php

include_once "../pdo/AutomovelPDO.php";

include_once "../pdo/ModeloPDO.php";

include_once "../pdo/MarcaPDO.php";

include_once "../model/Automovel.php";


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AutomovelPDO
 *
 * @author feijo
 */
class AutomovelController {

    private $automovelPDO;
    private $modeloPDO;
    private $marcaPDO;

    public function __construct() {
        $this->marcaPDO = new MarcaPDO();
        $this->modeloPDO = new ModeloPDO;
        $this->automovelPDO = new AutomovelPDO;
    }

    public function menuAutomovel() {
        $exit = 1;

        while ($exit != 0) {
            echo "\r\n\n--------- Submenu Automovel ---------";
            echo "\n1. Inserir Automovel";
            echo "\n2. Alterar Automovel";
            echo "\n3. Excluir Automovel (soft delete)";
            echo "\n4. Listar todos os Automovel";
            echo "\n5. Listar Automovel pelo Renavan";
            echo "\n6. Listar Automovel pela Placa";
            echo "\n7. Listar Automovel pela Cor";
            echo "\n8. Listar Automovel pelo Modelo";
            echo "\n9. Reativar Automovel pelo Cpf";
            echo "\nOpção (ZERO para sair): ";
            $exit = fgets(STDIN);
            switch ($exit) {
                case 0:
                    break;
                case 1:
                    $this->inserirAuto();
                    break;
                case 2:
                    $this->alterarAuto();
                    break;
                case 3:
                    $this->excluirAuto();
                    break;
                case 4:
                    $this->listarTodosAutos();
                    break;
                case 5:
                    $this->listarAutoPeloRenavan();
                    break;
                case 6:
                    $this->listarAutoPelaPlaca();
                    break;
                case 7:
                    $this->listarAutoPelaCor();
                    break;
                case 8:
                    $this->listarAutoPeloModelo();
                    break;
                case 9:
                    $this->reativarAutoByPlaca();
                    break;
                default:
                    echo "\nOpção inexistente.";
            }
        }
    }

    //insert (case 1)
    private function inserirAuto() {
        $automovel = new Automovel(" ");
        $automovelPDO = new AutomovelPDO();
        $automovel->setSituacao(true);
        A:


        echo"\nDigite o renavan do veiculo: ";
        $renavan = fgets(STDIN);
        if (strlen(rtrim($renavan)) == 11) {
            try {
                if (preg_match("/^([a-z-0-9]+)$/i", $renavan)) {
                    if (preg_match("/^([a-z]+)$/i", $renavan)) {
                        echo "\nFavor Verifique o renavan voce digitou somente letras!!!";
                        goto A;
                    } else {
                        if (preg_match("/^([0-9]+)$/i", $renavan)) {
                            $respRen = $automovelPDO->findCarByRenavan($renavan);
                            while (isset($respRen) && empty($respRen)) {
                                echo"\n este renavan ja existe!!!";
                                goto A;
                            }
                            $automovel->setRenavan($renavan);
                        } else {
                            echo "\nFavor Verifique o renavan voce digitou numeros misturados com letras!!!";
                            goto A;
                        }
                    }
                } else {
                    echo "\nFavor Verifique o renavan !!!";
                    goto A;
                }
            } catch (Exception $ex) {
                echo "\nFavor Verifique o renavan !!!";
                goto A;
            }
        } else {
            echo "\nFavor Verifique o renavan seram aceitos apenas 11 digitos!!!";
            goto A;
        }

        B:
        echo"\nDigite a placa do veiculo: ";
        $placa = rtrim(fgets(STDIN));
        $letr = substr($placa, 0, 3);
        $num = substr($placa, 3, 7);
        if (strlen($placa) == 7) {
            if (preg_match("/^([a-z]+)$/i", $letr)) {
                if (preg_match("/^([0-9]+)$/i", $num)) {
                    $respPl = $automovelPDO->findCarByPlaca(rtrim($placa));
                    while (isset($respPl) && !empty($respPl)) {
                        echo"\n Esta placa ja esta associada a outro carro!!!";
                        goto B;
                    }
                    $automovel->setPlaca($placa);
                } else {
                    echo "\nVoce digitou letras no lugar de numeros!!!";
                    goto B;
                }
            } else {
                echo "\nVoce digitou numeros no lugar letras!!!";
                goto B;
            }
        } else {
            echo "\nNomes em branco nao sao aceitos!!!";
            goto B;
        }


        C:
        echo"\nDigite a cor do veiculo: ";
        $cor = rtrim(fgets(STDIN));
        if (strlen($cor) >= 1) {
            $automovel->setCor($cor);
        } else {
            echo "\nCores sem nome nao sao aceitos!!!";
            goto C;
        }


        D:
        echo"\nDigite o numero de portas do veiculo: ";
        $porta = rtrim(fgets(STDIN));
        if ($porta >= 1) {
            $automovel->setNroPortas($porta);
        } else {
            echo "\nCarro Sem Portas ?";
            goto D;
        }

        E:
        echo"\nDigite o tipo de combustivel do veiculo 1-Gasolina 2-Alcool 3-Flex: ";
        $tipo = rtrim(fgets(STDIN));
        switch ($tipo) {
            case 1:
                $automovel->setTipoCombustivel($tipo);
                break;
            case 2:
                $automovel->setTipoCombustivel($tipo);
                break;
            case 3:
                $automovel->setTipoCombustivel($tipo);
                break;
            default :
                echo "\nEsta opcao nao existe!";
                goto E;
                break;
        }


        F:
        echo"\nDigite o numero do chassi do veiculo: ";
        $chassi = rtrim(fgets(STDIN));
        if (strlen($chassi) == 17) {
            $automovel->setChassi($chassi);
        } else {
            echo "\nChassi deve ser composto por 17 digitos !!!";
            goto F;
        }

        G:
        echo"\nDigite o Valor da locação do veiculo: ";
        $valor = rtrim(fgets(STDIN));
        if (isset($valor) && $valor > 0) {
            $automovel->setValorLocacao($valor);
        } else {
            echo "\nValor deve ser positivo!!!";
            goto G;
        }

        H:
        echo"\nDigite a Kilometragem do veiculo: ";
        $km = rtrim(fgets(STDIN));
        if (isset($km) && $km >= 0) {
            $automovel->setKm($km);
        } else {
            echo "\nKilometragem deve ser positivo!!!";
            goto H;
        }



        I:
        $modelos = $this->modeloPDO->findAll();
        $index = 1;
        echo"\nModelos disponiveis: ";
        if (isset($modelos) && !empty($modelos)) {
            foreach ($modelos as $key) {
                echo "\n" . $index . "-" . $key->getDescricao();
                $index++;
            }
        }
        echo"\nSelecione o modelo : ";
        $ind = rtrim(fgets(STDIN));
//    if ($desc < 1 && $desc > $index) {
//            echo "\n Opcao invalida";
//            goto I;
//        }
        $index = 1;
        foreach ($modelos as $key) {
            if ($index == $ind) {
                $desc = $key->getDescricao();
            }
            $index++;
        }

        $modelo = $this->modeloPDO->findByModelo($desc);
        if (isset($modelo) && !empty($modelo)) {
            $automovel->setModelo($modelo[0]);
        } else {
            echo "/n Este modelo não existe!!!!";
            goto I;
        }
        print_r($automovel);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->automovelPDO->insert($automovel)) {
                echo "\nAutomovel salvo.";
            } else {
                echo "\nFalha ao salvar o Automovel.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

    //update (case 2)
    private function alterarAuto() {
        A:
        echo "\nDigite placa do veiculo que você deseja alterar: ";
        $placa = rtrim(fgets(STDIN));
        if (strlen($placa) == 0 || strlen($placa) < 7) {
            echo"\nPlaca nao esta no formato correto!!!: ";
            goto A;
        }
        $auto = $this->automovelPDO->findCarByPlaca($placa);
        if(isset($auto) && empty($auto)){
            echo"\nPlaca nao existe!!!: ";
            goto A;
        }
        $automovel = $auto[0];
        if ($auto != null) {
            print_r($auto);

            B:
            echo"\nDigite 1 para manter: " . $automovel->getPlaca();
            echo"\nOu Digite a nova placa do veiculo: ";
            $placa = rtrim(fgets(STDIN));
            if ($placa == 1) {
                goto C;
            }
            if (strlen($placa) == 0) {
                echo"\nPlacas em branco nao seram aceitas!!!: ";
                goto B;
            }
            $letr = substr($placa, 0, 3);
            $num = substr($placa, 3, 7);
            if (strlen($placa) == 7) {
                if (preg_match("/^([a-z]+)$/i", $letr)) {
                    if (preg_match("/^([0-9]+)$/i", $num)) {

                        $automovel->setPlaca($placa);
                    } else {
                        echo "\nVoce digitou letras no lugar de numeros!!!";
                        goto B;
                    }
                } else {
                    echo "\nVoce digitou numeros no lugar letras!!!";
                    goto B;
                }
            } else {
                echo "\nA placa esta incompleta!!!";
                goto B;
            }


            C:
            echo"\nDigite 2 para manter: " . $automovel->getCor();
            echo"\nDigite nova a cor do veiculo: ";
            $cor = rtrim(fgets(STDIN));
            if ($cor == 2) {
                goto D;
            }


            if (strlen($cor) >= 1) {
                $automovel->setCor($cor);
            } else {
                echo "\nCores sem nome nao sao aceitos!!!";
                goto C;
            }


            D:
            echo"\nDigite 3 para manter: " . $automovel->getNroPortas();
            echo"\nDigite o novo numero de portas do veiculo: ";
            $porta = rtrim(fgets(STDIN));
            if ($porta == 3) {
                goto E;
            }
            if (strlen($porta) >= 1) {
                $automovel->setNroPortas($porta);
            } else {
                echo "\nCarro Sem Portas ?";
                goto D;
            }

            E:
            echo"\nDigite 4 para manter: " . $automovel->getTipoCombustivel();
            echo"\nDigite o novo tipo de combustivel do veiculo 1-Gasolina 2-Alcool 3-Flex: ";
            $tipo = rtrim(fgets(STDIN));
            if ($tipo == 4) {
                goto F;
            }
            switch ($tipo) {
                case 1:
                    $automovel->setTipoCombustivel($tipo);
                    break;
                case 2:
                    $automovel->setTipoCombustivel($tipo);
                    break;
                case 3:
                    $automovel->setTipoCombustivel($tipo);
                    break;
                default :
                    echo "\nEsta opcao nao existe!";
                    goto E;
                    break;
            }


            F:
            echo"\nDigite 5 para manter: " . $automovel->getChassi();
            echo"\nDigite o novo numero do chassi do veiculo: ";
            $chassi = rtrim(fgets(STDIN));
            if ($chassi == 5) {
                goto G;
            }

            if (strlen($chassi) == 17) {
                $automovel->setChassi($chassi);
            } else {
                echo "\nChassi deve ser composto por 17 digitos !!!";
                goto F;
            }

            G:
            echo"\nDigite 6 para manter: " . $automovel->getValorLocacao();
            echo"\nDigite o novo Valor da locação do veiculo: ";
            $valor = rtrim(fgets(STDIN));
            if ($chassi == 6) {
                goto H;
            }
            if (isset($valor) && $valor > 0) {
                $automovel->setValorLocacao($valor);
            } else {
                echo "\nValor deve ser positivo!!!";
                goto G;
            }

            H:
            echo"\nDigite 7 para manter: " . $automovel->getKm();
            echo"\nDigite a nova Kilometragem do veiculo: ";
            $km = rtrim(fgets(STDIN));
            if ($chassi == 7) {
                goto I;
            }

            if (isset($km) && $km >= 0) {
                $automovel->setKm($km);
            } else {
                echo "\nKilometragem deve ser positivo!!!";
                goto H;
            }

            I:

            $mod = $this->modeloPDO->findModeloById($automovel->getModelo()->getId_modelo());
            $mar = $this->marcaPDO->findMarcaById($mod[0]->getMarca()->getId());
            $mod[0]->setMarca($mar);
            $automovel->setModelo($mod[0]);



            echo"\nDigite 8 para manter: " . $automovel->getModelo()->getDescricao();
            echo"\nDigite a descricao do modelo do veiculo: ";
            $desc = rtrim(fgets(STDIN));

            if ($desc == 8) {
                goto J;
            }
            if (strlen($desc) <= 0) {
                goto I;
            }
            $modelo = $this->modeloPDO->findByModelo($desc);
            if (isset($modelo) && !empty($modelo)) {
                $automovel->setModelo($modelo[0]);
            } else {
                echo "/n Este modelo não existe!!!!";
                goto I;
            }
            J:
            print_r($automovel);
            echo "\nConfirmar a operação (s/n)? ";
            $operacao = rtrim(fgets(STDIN));

            if (!strcasecmp($operacao, "s")) {
                if ($this->automovelPDO->update($automovel)) {
                    echo "\nAutomovel salvo.";
                } else {
                    echo "\nFalha ao alterar o Automovel.";
                }
            }
            if (!strcasecmp($operacao, "n")) {
                echo "\nOperação cancelada.";
            }
        } else {
            echo "\nNão há Automovel cadastrados com esse Renavan.";
        }
    }

    //update (case 3)
    private function excluirAuto() {
        B:
        echo"\nDigite a placa do veiculo: ";
        $placa = rtrim(fgets(STDIN));
        $letr = substr($placa, 0, 3);
        $num = substr($placa, 3, 7);
        if (strlen($placa) == 7) {
            if (preg_match("/^([a-z]+)$/i", $letr)) {
                if (preg_match("/^([0-9]+)$/i", $num)) {
                    $auto = $this->automovelPDO->findCarByPlaca(rtrim($placa));
                    while (isset($auto) && empty($auto)) {
                        echo"\n Esta placa nao esta associada a um carro!!!";
                        goto B;
                    }
                    print_r($auto);
                    echo "\nConfirmar a operação (s/n)? ";
                    $operacao = rtrim(fgets(STDIN));

                    if (!strcasecmp($operacao, "s")) {
                        if ($this->automovelPDO->deleteSoft($auto[0])) {
                            echo "\nAutomovel excluído.";
                        } else {
                            echo "\nFalha ao desativar veiculo.";
                        }
                    }
                    if (!strcasecmp($operacao, "n")) {
                        echo "\nOperação cancelada.";
                    }
                } else {
                    echo "\nVoce digitou letras no lugar de numeros!!!";
                    goto B;
                }
            } else {
                echo "\nVoce digitou numeros no lugar letras!!!";
                goto B;
            }
        } else {
            echo "\nA placa deve ser composta de 3 letras e 4 numeros!!!";
            goto B;
        }
    }

    //findAll ou SELECT sem filtros (case 4)
    private function listarTodosAutos() {
        $auto = $this->automovelPDO->findAll();
        if (isset($auto) && empty($auto)) {
            echo "\nNao ha veiculos";
        } else {
            foreach ($auto as $key) {
                $mod = $this->modeloPDO->findModeloById($key->getModelo()->getId_modelo());
                $mar = $this->marcaPDO->findMarcaById($mod[0]->getMarca()->getId());
                $mod[0]->setMarca($mar);
                $key->setModelo($mod);
                if (isset($key) && !empty($key)) {
                    print_r($key);
                } else {
                    echo "\nNao ha Automoveis com este modelo!!!";
                }
            }
        }
    }

    //find for name ou SELECT com filtros (case 5)
    private function listarAutoPeloRenavan() {
        A:
        echo"\nDigite o renavan do veiculo: ";
        $renavan = rtrim(fgets(STDIN));
        if (strlen($renavan) == 11) {
            try {
                if (preg_match("/^([a-z-0-9]+)$/i", $renavan)) {
                    if (preg_match("/^([a-z]+)$/i", $renavan)) {
                        echo "\nFavor Verifique o renavan voce digitou somente letras!!!";
                        goto A;
                    } else {
                        if (preg_match("/^([0-9]+)$/i", $renavan)) {
                            $respRen = $this->automovelPDO->findCarByRenavan($renavan);
                            while (isset($respRen) && empty($respRen)) {
                                echo"\n este renavan nao existe existe!!!";
                                goto A;
                            }
                            foreach ($respRen as $key) {
                                $mod = $this->modeloPDO->findModeloById($key->getModelo()->getId_modelo());
                                $mar = $this->marcaPDO->findMarcaById($mod[0]->getMarca()->getId());
                                $mod[0]->setMarca($mar);
                                $key->setModelo($mod[0]);
                                if (isset($key) && !empty($key)) {
                                    print_r($key);
                                } else {
                                    echo "\nNao ha Automoveis com este modelo!!!";
                                }
                            }
                        } else {
                            echo "\nFavor Verifique o renavan voce digitou numeros misturados com letras!!!";
                            goto A;
                        }
                    }
                } else {
                    echo "\nFavor Verifique o renavan !!!";
                    goto A;
                }
            } catch (Exception $ex) {
                echo "\nFavor Verifique o renavan !!!";
                goto A;
            }
        } else {
            echo "\nFavor Verifique o renavan seram aceitos apenas 11 digitos!!!";
            goto A;
        }
    }

    private function listarAutoPelaPlaca() {

        B:
        echo"\nDigite a placa do veiculo: ";
        $placa = rtrim(fgets(STDIN));
        $letr = substr($placa, 0, 3);
        $num = substr($placa, 3, 7);
        if (strlen($placa) == 7) {
            if (preg_match("/^([a-z]+)$/i", $letr)) {
                if (preg_match("/^([0-9]+)$/i", $num)) {
                    $respPl = $this->automovelPDO->findCarByPlaca(rtrim($placa));
                    while (isset($respPl) && empty($respPl)) {
                        echo"\n Esta placa nao existe!!!";
                        goto B;
                    }
                    foreach ($respPl as $key) {
                        $mod = $this->modeloPDO->findModeloById($key->getModelo()->getId_modelo());
                        $mar = $this->marcaPDO->findMarcaById($mod[0]->getMarca()->getId());
                        $mod[0]->setMarca($mar);
                        $key->setModelo($mod[0]);
                        if (isset($key) && !empty($key)) {
                            print_r($key);
                        } else {
                            echo "\nNao ha Automoveis com este modelo!!!";
                        }
                    }
                } else {
                    echo "\nVoce digitou letras no lugar de numeros!!!";
                    goto B;
                }
            } else {
                echo "\nVoce digitou numeros no lugar letras!!!";
                goto B;
            }
        } else {
            echo "\nNomes em branco nao sao aceitos!!!";
            goto B;
        }
    }

    private function listarAutoPelaCor() {
        C:
        echo"\nDigite a cor do veiculo: ";
        $cor = rtrim(fgets(STDIN));
        if (strlen($cor) >= 1) {

            $resp = $this->automovelPDO->findCarByCor($cor);
            if (isset($resp) && !empty($resp)) {
                foreach ($resp as $key) {
                    $mod = $this->modeloPDO->findModeloById($key->getModelo()->getId_modelo());
                    $mar = $this->marcaPDO->findMarcaById($mod[0]->getMarca()->getId());
                    $mod[0]->setMarca($mar);
                    $key->setModelo($mod[0]);
                    if (isset($key) && !empty($key)) {
                        print_r($key);
                    } else {
                        echo "\nNao ha Automoveis com este modelo!!!";
                    }
                }
            } else {
                echo "\n Nao existe veiculo com esta cor!!!";
                goto C;
            }
        } else {
            echo "\nCores sem nome nao sao aceitos!!!";
            goto C;
        }
    }

    private function listarAutoPeloModelo() {

        I:
        echo"\nDigite a descricao do modelo do veiculo: ";
        $desc = rtrim(fgets(STDIN));
        if (strlen($desc) <= 0) {
            echo "\n Nao existe veiculo com esta descricao!!!";
            goto I;
        }
        $resp = $this->automovelPDO->findCarByModelo($desc);
        if (isset($resp) && !empty($resp)) {
            foreach ($resp as $key) {
                $mod = $this->modeloPDO->findModeloById($key->getModelo()->getId_modelo());
                $mar = $this->marcaPDO->findMarcaById($mod[0]->getMarca()->getId());
                $mod[0]->setMarca($mar);
                $key->setModelo($mod[0]);
                if (isset($key) && !empty($key)) {
                    print_r($key);
                } else {
                    echo "\nNao ha Automoveis com este modelo!!!";
                }
            }
        } else {
            echo "\n Nao existe veiculo com este modelo!!!";
            goto I;
        }
    }

    //update (case 7)
    private function reativarAutoByPlaca() {
        B:
        echo"\nDigite a placa do veiculo: ";
        $placa = rtrim(fgets(STDIN));
        $letr = substr($placa, 0, 3);
        $num = substr($placa, 3, 7);
        if (strlen($placa) == 7) {
            if (preg_match("/^([a-z]+)$/i", $letr)) {
                if (preg_match("/^([0-9]+)$/i", $num)) {
                    $auto = $this->automovelPDO->findCarByPlacaR(rtrim($placa));
                    while (isset($auto) && empty($auto)) {
                        echo"\n Esta placa nao esta associada a um carro!!!";
                        goto B;
                    }
                    foreach ($auto as $key) {
                        $mod = $this->modeloPDO->findModeloById($key->getModelo()->getId_modelo());
                        $mar = $this->marcaPDO->findMarcaById($mod[0]->getMarca()->getId());
                        $mod[0]->setMarca($mar);
                        $key->setModelo($mod[0]);
                        if (isset($key) && !empty($key)) {
                            print_r($key);
                        } else {
                            echo "\nNao ha Automoveis com este modelo!!!";
                        }
                    }
                    echo "\nConfirmar a operação (s/n)? ";
                    $operacao = rtrim(fgets(STDIN));

                    if (!strcasecmp($operacao, "s")) {
                        if ($this->automovelPDO->reactivateAutomovel($auto[0])) {
                            echo "\nAutomovel Ativado.";
                        } else {
                            echo "\nFalha ao ativar veiculo.";
                        }
                    }
                    if (!strcasecmp($operacao, "n")) {
                        echo "\nOperação cancelada.";
                    }
                } else {
                    echo "\nVoce digitou letras no lugar de numeros!!!";
                    goto B;
                }
            } else {
                echo "\nVoce digitou numeros no lugar letras!!!";
                goto B;
            }
        } else {
            echo "\nA placa deve ser composta de 3 letras e 4 numeros!!!";
            goto B;
        }
    }

}

//$autoController = new AutomovelController();
//$autoController->menuAutomovel();

