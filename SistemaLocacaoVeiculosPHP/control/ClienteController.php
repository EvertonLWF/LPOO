<?php

include_once "../pdo/ClientePDO.php";

include_once "../pdo/LocacaoPDO.php";

include_once "../pdo/AutomovelPDO.php";

include_once "../model/Cliente.php";

/**
 * Description of ClienteController
 *
 * @author feijo
 */
class ClienteController {

    private $clientePDO;
    private $locacaoPDO;
    private $automovelPDO;

    public function __construct() {
        $this->clientePDO = new ClientePDO();
        $this->locacaoPDO = new locacaoPDO();
        $this->automovelPDO = new AutomovelPDO();
    }

    public function menuCliente() {
        $exit = 1;

        while ($exit != 0) {
            echo "\n\n--------- Submenu Cliente ---------";
            echo "\n1. Inserir Cliente";
            echo "\n2. Alterar Cliente";
            echo "\n3. Excluir Cliente (soft delete)";
            echo "\n4. Listar todos os clientes";
            echo "\n5. Listar clientes pelo nome";
            echo "\n6. Listar cliente pelo cpf";
            echo "\n7. Reativar cliente pelo código";
            echo "\nOpção (ZERO para sair): ";
            $exit = fgets(STDIN);
            switch ($exit) {
                case 0:
                    break;
                case 1:
                    $this->inserirCliente();
                    break;
                case 2:
                    $this->alterarCliente();
                    break;
                case 3:
                    $this->excluirCliente();
                    break;
                case 4:
                    $this->listarTodosClientes();
                    break;
                case 5:
                    $this->listarClientesPeloNome();
                    break;
                case 6:
                    $this->listarClientePeloCpf();
                    break;
                case 7:
                    $this->reativarClientePeloCpf();
                    break;
                default:
                    echo "\nOpção inexistente.";
            }
        }
    }

    //insert (case 1)>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    private function inserirCliente() {
        $cliente = new Cliente();

        A:
        echo"\nInforme o Nome do Cliente: ";
        $nome = rtrim(fgets(STDIN));
        $cons = $this->clientePDO->findByClient($nome);
        if(isset($cons) && !empty($cons)){
            echo "\nEste nome ja esta sendo usado!!!";
            goto A;
        }
        
        
        if (strlen($nome) >= 1) {
            $cliente->setNome_cli($nome);
        } else {
            echo "\nNomes em branco nao sao aceitos!!!";
            goto A;
        }//ok

        B:
        echo"\nInforme o CPF do Cliente: ";
        $cpf = rtrim(fgets(STDIN));
        $cons = $this->clientePDO->findClientByCpf($cpf);
        if(isset($cons) && !empty($cons)){
            echo "\nEste cpf ja esta sendo usado!!!";
            goto B;
        }
        
        
        if (strlen($cpf) == 11) {
            try {
                if (preg_match("/^([a-z-0-9]+)$/i", $cpf)) {
                    if (preg_match("/^([a-z]+)$/i", $cpf)) {
                        echo "\nFavor Verifique o CPF voce digitou somente letras!!!";
                        goto B;
                    } else {
                        if (preg_match("/^([0-9]+)$/i", $cpf)) {
                            $cliente->setCpf_cli($cpf);
                        } else {
                            echo "\nFavor Verifique o CPF voce digitou numeros misturados com letras!!!";
                            goto B;
                        }
                    }
                } else {
                    echo "\nFavor Verifique o CPF !!!";
                    goto B;
                }
            } catch (Exception $ex) {
                echo "\nFavor Verifique o CPF !!!";
                goto B;
            }
        } else {
            echo "\nFavor Verifique o CPF seram aceitos apenas 11 digitos!!!";
            goto B;
        }


        C:
        echo"\nInforme o DDD + telefone do Cliente: ";
        $tel = rtrim(fgets(STDIN));
        if (strlen($tel) == 12) {
            try {
                if (preg_match("/^([a-z-0-9]+)$/i", $tel)) {
                    if (preg_match("/^([a-z]+)$/i", $tel)) {
                        echo "\nFavor Verifique o DDD + telefone voce digitou somente letras!!!";
                        goto C;
                    } else {
                        if (preg_match("/^([0-9]+)$/i", $tel)) {
                            $cliente->setTel_cli($tel);
                        } else {
                            echo "\nFavor Verifique o DDD + telefone voce digitou numeros misturados com letras!!!";
                            goto C;
                        }
                    }
                } else {
                    echo "\nFavor Verifique o DDD + telefone !!!";
                    goto C;
                }
            } catch (Exception $ex) {
                echo "\nFavor Verifique o DDD + telefone !!!";
                goto C;
            }
        } else {
            echo "\nFavor Verifique o DDD + telefone seram aceitos apenas 12 digitos!!!";
            goto C;
        }

        D:
        echo"\nInforme o Endereco do Cliente: ";

        $end = rtrim(fgets(STDIN));

        if (strlen($end) >= 1) {
            $cliente->setEnd_cli($end);
        } else {
            echo "\nEndereços em branco nao sao aceitos!!!";
            goto D;
        }

        E:
        echo"\nInforme o Email do Cliente: ";

        $email = rtrim(fgets(STDIN));

        if (strlen($email) >= 1) {
            if (strpbrk($email, '@')) {
                $cliente->setEmail_cli($email);
            } else {
                echo "\nEmail nao esta no formato correto!!!";
                goto E;
            }
        } else {
            echo "\nEmail em branco nao sao aceitos!!!";
            goto E;
        }

        $cliente->setSituacao(true);

        print_r($cliente);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->clientePDO->insert($cliente)) {
                echo "\nCliente salvo.";
            } else {
                echo "\nFalha ao salvar o cliente. Contate o administrador do sistema.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

    //update (case 2)>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    private function alterarCliente() {
        A:
        echo"\nInforme o CPF do Cliente: ";
        $cpf = rtrim(fgets(STDIN));
        if (strlen($cpf) == 11) {
            try {
                if (preg_match("/^([a-z-0-9]+)$/i", $cpf)) {
                    if (preg_match("/^([a-z]+)$/i", $cpf)) {
                        echo "\nFavor Verifique o CPF voce digitou somente letras!!!";
                        goto A;
                    } else {
                        if (preg_match("/^([0-9]+)$/i", $cpf)) {
                            $cliente = $this->clientePDO->findClientByCpf($cpf);
                        } else {
                            echo "\nFavor Verifique o CPF voce digitou numeros misturados com letras!!!";
                            goto A;
                        }
                    }
                } else {
                    echo "\nFavor Verifique o CPF !!!";
                    goto A;
                }
            } catch (Exception $ex) {
                echo "\nFavor Verifique o CPF !!!";
                goto A;
            }
        } else {
            echo "\nFavor Verifique o CPF seram aceitos apenas 11 digitos!!!";
            goto A;
        }
        
        if (isset($cliente) && !empty($cliente)) {
            print_r($cliente);

            B:
            echo"\nDigite 1 para : ".$cliente[0]->getNome_cli();
            echo"\nOu Informe o novo Nome do Cliente: ";
            $nome = rtrim(fgets(STDIN));
            if($nome == 1){
                goto C;
            }
            
            if (strlen($nome) >= 1) {
                $cliente[0]->setNome_cli($nome);
            } else {
                echo "\nNomes em branco nao sao aceitos!!!";
                goto B;
            }

            C:
            echo"\nDigite 2 para : ".$cliente[0]->getEnd_cli();
            echo"\nou Informe o novo endereco do Cliente: ";
            $end = rtrim(fgets(STDIN));
           if($end == 2){
                goto D;
            }


            if (strlen($end) >= 1) {
                $cliente[0]->setEnd_cli($end);
            } else {
                echo "\nEndereços em branco nao sao aceitos!!!";
                goto C;
            }

            D:
            
            echo"\nDigite 3 para : ".$cliente[0]->getTel_cli();
            echo"\nOu Informe o novo  (DDD + telefone) do Cliente: ";
            $tel = rtrim(fgets(STDIN));
            if($tel == 3){
                goto E;
            }
            if (strlen($tel) == 12) {
                try {
                    if (preg_match("/^([a-z-0-9]+)$/i", $tel)) {
                        if (preg_match("/^([a-z]+)$/i", $tel)) {
                            echo "\nFavor Verifique o DDD + telefone voce digitou somente letras!!!";
                            goto D;
                        } else {
                            if (preg_match("/^([0-9]+)$/i", $tel)) {
                                $cliente[0]->setTel_cli($tel);
                            } else {
                                echo "\nFavor Verifique o DDD + telefone voce digitou numeros misturados com letras!!!";
                                goto D;
                            }
                        }
                    } else {
                        echo "\nFavor Verifique o DDD + telefone !!!";
                        goto D;
                    }
                } catch (Exception $ex) {
                    echo "\nFavor Verifique o DDD + telefone !!!";
                    goto D;
                }
            } else {
                echo "\nFavor Verifique o DDD + telefone seram aceitos apenas 12 digitos!!!";
                goto D;
            }

            E:
            echo"\nDigite 4 para : ".$cliente[0]->getEmail_cli();
            echo"\nOu Informe o novo Email do Cliente: ";

            $end = rtrim(fgets(STDIN));
            if($end == 4){
                goto F;
            }
            if (strlen($end) >= 1) {
                if (strpbrk($end, '@')) {
                    $cliente[0]->setEmail_cli($end);
                } else {
                    echo "\nEmail nao esta no formato correto!!!";
                    goto E;
                }
            } else {
                echo "\nEmail em branco nao sao aceitos!!!";
                goto E;
            }
            F:
            print_r($cliente[0]);
            echo "\nConfirmar a operação (s/n)? ";
            $operacao = rtrim(fgets(STDIN));

            if (!strcasecmp($operacao, "s")) {
                if ($this->clientePDO->update($cliente[0])) {
                    echo "\nCliente Editado salvo.";
                } else {
                    echo "\nFalha ao editar cliente. Contate o administrador do sistema.";
                }
            }
            if (!strcasecmp($operacao, "n")) {
                echo "\nOperação cancelada.";
            }
        } else {
            echo "\nNão há clientes cadastrados com esse código.";
        }
    }

    //update (case 3)
    private function excluirCliente() {
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
                            $cliente = $this->clientePDO->findClientByCpf($cpf);
                        } else {
                            echo "\nFavor Verifique o CPF voce digitou numeros misturados com letras!!!";
                            goto B;
                        }
                    }
                } else {
                    echo "\nFavor Verifique o CPF !!!";
                    goto B;
                }
            } catch (Exception $ex) {
                echo "\nFavor Verifique o CPF !!!";
                goto B;
            }
        } else {
            echo "\nFavor Verifique o CPF seram aceitos apenas 11 digitos!!!";
            goto B;
        }
        if (isset($cliente) && empty($cliente)) {
            echo "\nNao existe cliente com este CPF !!!";
            goto B;
        }
        print_r($cliente);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->clientePDO->deleteSoft($cliente[0])) {
                echo "\nCliente excluído.";
            } else {
                echo "\nFalha ao reativar o cliente. Contate o administrador do sistema.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

    //findAll ou SELECT sem filtros (case 4)
    private function listarTodosClientes() {
        $cli = $this->clientePDO->findAll();

        foreach ($cli as $key) {
            $loc = $this->locacaoPDO->findLocacaoByCliente($key->getCpf_cli());
            if (isset($loc) && !empty($loc)) {
                $auto = $this->automovelPDO->findCarByRenavan($loc[0]->getautomovel()->getRenavan());
                $loc[0]->setAutomovel($auto[0]);
                $key->setLocacoes($loc[0]);
            }
            if (isset($key) && !empty($key)) {
                print_r($key);
            } else {
                echo "\nNao ha clientes!!!";
            }
        }
    }

    //find for name ou SELECT com filtros (case 5)
    private function listarClientesPeloNome() {
        A:
        echo"\nInforme o Nome do Cliente: ";
        $nome = rtrim(fgets(STDIN));
        if (strlen($nome) >= 1) {
            $cli = $this->clientePDO->findByClient($nome);
            foreach ($cli as $key) {
                $loc = $this->locacaoPDO->findLocacaoByCliente($key->getCpf_cli());
                $key->setLocacoes($loc);
                if (isset($key) && !empty($key)) {
                    print_r($key);
                } else {
                    echo "\nNao ha clientes!!!";
                }
            }
        } else {
            echo "\nNomes em branco nao sao aceitos!!!";
            goto A;
        }//ok
    }

    //find for id ou SELECT com filtros (case 6)
    private function listarClientePeloCpf() {
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
                            foreach ($cli as $key) {
                                $loc = $this->locacaoPDO->findLocacaoByCliente($key->getCpf_cli());
                                $key->setLocacoes($loc);
                                if (isset($key) && !empty($key)) {
                                    print_r($key);
                                } else {
                                    echo "\nNao ha clientes!!!";
                                }
                            }
                        } else {
                            echo "\nFavor Verifique o CPF voce digitou numeros misturados com letras!!!";
                            goto B;
                        }
                    }
                } else {
                    echo "\nFavor Verifique o CPF !!!";
                    goto B;
                }
            } catch (Exception $ex) {
                echo "\nFavor Verifique o CPF !!!";
                goto B;
            }
        } else {
            echo "\nFavor Verifique o CPF seram aceitos apenas 11 digitos!!!";
            goto B;
        }
    }

    //update (case 7)
    private function reativarClientePeloCpf() {
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
                            $cli = $this->clientePDO->findClientByCpfR($cpf);
                            foreach ($cli as $key) {
                                $loc = $this->locacaoPDO->findLocacaoByCliente($key->getCpf_cli());
                                $key->setLocacoes($loc);
                                if (isset($key) && !empty($key)) {
                                    print_r($key);
                                } else {
                                    echo "\nNao ha clientes!!!";
                                }
                            }
                        } else {
                            echo "\nFavor Verifique o CPF voce digitou numeros misturados com letras!!!";
                            goto B;
                        }
                    }
                } else {
                    echo "\nFavor Verifique o CPF !!!";
                    goto B;
                }
            } catch (Exception $ex) {
                echo "\nFavor Verifique o CPF !!!";
                goto B;
            }
        } else {
            echo "\nFavor Verifique o CPF seram aceitos apenas 11 digitos!!!";
            goto B;
        }
        if (isset($cliente) && empty($cliente)) {
            echo "\nNao existe cliente com este CPF !!!";
            goto B;
        }
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->clientePDO->reactivateCliente($cli[0])) {
                echo "\nCliente Reativado.";
            } else {
                echo "\nFalha ao reativar o cliente. Contate o administrador do sistema.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

}

//$clienteController = new ClienteController();
//$clienteController->menuCliente();

