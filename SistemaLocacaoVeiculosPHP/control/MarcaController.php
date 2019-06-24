<?php

include_once "../pdo/ModeloPDO.php";

include_once "../pdo/MarcaPDO.php";

include_once "../model/Marca.php";

class MarcaController {

    private $marcaPDO;
    private $modeloPDO;
    private $marca;

    public function __construct() {
        $this->marcaPDO = new MarcaPDO;
        $this->modeloPDO = new ModeloPDO;
        $this->marca = new Marca;
    }

    public function menuMarca() {
        $exit = 1;

        while ($exit != 0) {
            echo "\r\n\n--------- Submenu Marca ---------";
            echo "\n1. Inserir Marca";
            echo "\n2. Alterar Marca";
            echo "\n3. Excluir Marca (soft delete)";
            echo "\n4. Listar todos as Marca";
            echo "\n5. Listar Marca pela descricao";
            echo "\n6. Listar Marca pela situacao";
            echo "\n7. Reativar Marca pelo descricao";
            echo "\nOpção (ZERO para sair): ";
            $exit = fgets(STDIN);
            switch ($exit) {
                case 0:
                    break;
                case 1:
                    $this->inserirMarca();
                    break;
                case 2:
                    $this->alterarMarca();
                    break;
                case 3:
                    $this->excluirMarca();
                    break;
                case 4:
                    $this->listarTodasMarca();
                    break;
                case 5:
                    $this->listarMarcaPelaDescricao();
                    break;
                case 6:
                    $this->listarMarcaPelaSituacao();
                    break;
                case 7:
                    $this->reativarMarcaPeloNome();
                    break;
                default:
                    echo "\nOpção inexistente.";
            }
        }
    }

    private function inserirMarca() {
        $marca = new Marca();

        A:
        echo"\nInforme o Nome da Marca: ";
        $nome = rtrim(fgets(STDIN));
        if (strlen($nome) >= 1) {
            $marca->setMarca($nome);
            $marca->setSituacao(true);
        } else {
            echo "\nMarcas em branco nao sao aceitos!!!";
            goto A;
        }

        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->marcaPDO->insert($marca)) {
                echo "\nMarca salva.";
            } else {
                echo "\nFalha ao salvar marca. Contate o administrador do sistema.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

    //update (case 2)
    private function alterarMarca() {

        echo"\nInforme o Nome da Marca: ";
        A:
        $marca = rtrim(fgets(STDIN));
        $resp = $this->marcaPDO->findByMarca($marca);
        if (isset($resp) && !empty($resp)) {
            print_r($resp[0]);
        } else {
            echo "\n Esta marca não existe";
            goto A;
        }
        if (isset($resp) && empty($resp)) {
            echo "\n nao existe marca com este nome!!!";
            goto A;
        }
        echo"\nInforme o Nome da Marca: ";
        $nome = rtrim(fgets(STDIN));

        if (strlen($nome) >= 1) {
            $resp[0]->setMarca($nome);
        } else {
            echo "\nMarcas em branco nao sao aceitos!!!";
            goto A;
        }
        print_r($resp);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->marcaPDO->update($resp[0])) {
                echo "\nMarca salva.";
            } else {
                echo "\nFalha ao salvar marca. Contate o administrador do sistema.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

    //excluir (case 3)
    private function excluirMarca() {
        A:
        echo "\nDigite descricao da marca que você deseja tornar inativo: ";
        $desc = rtrim(fgets(STDIN));
        $marca = $this->marcaPDO->findByMarca($desc);
        if (isset($marca) && empty($marca)) {
            echo "\n nao existe marca com este nome!!!";
            goto A;
        }
        print_r($marca[0]);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->marcaPDO->deleteSoft($marca[0]->getMarca())) {
                echo "\nMarca excluído.";
            } else {
                echo "\nFalha ao deletar Marca. Contate o administrador do sistema.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

    //findAll ou SELECT sem filtros (case 4)
    private function listarTodasMarca() {
        $marca = $this->marcaPDO->findAll();
        if (isset($marca) && empty(!$marca)) {
            foreach ($marca as $key) {
                $modelo = $this->modeloPDO->findModeloByMarca($key->getId());
                $key->setModelos($modelo);
                if (isset($key) && !empty($key)) {
                    print_r($key);
                } else {
                    echo "\nNao ha marcas!!!";
                }
            }
        } else {
            echo "\nNao ha marcas!!!";
        }
    }

    //find for name ou SELECT com filtros (case 5)
    private function listarMarcaPelaDescricao() {

        A:
        echo "\nDigite o marca para pesquisa: ";
        $nome = rtrim(fgets(STDIN));
        if (strlen($nome) >= 1) {
            $marca = $this->marcaPDO->findByMarca($nome);
            if (isset($marca) && empty($marca)) {
                echo "\n nao existe marca com este nome!!!";
                goto A;
            } else {
                foreach ($marca as $key) {
                    $modelo = $this->modeloPDO->findModeloByMarca($key->getId());
                    $key->setModelos($modelo);
                    if (isset($key) && !empty($key)) {
                        print_r($key);
                    } else {
                        echo "\nNao ha marcas!!!";
                    }
                }
            }
        } else {
            echo "\n Digite uma marca que não seja em braco!!!";
            goto A;
        }
    }

    //find for id ou SELECT com filtros (case 6)
    private function listarMarcaPelaSituacao() {
        A:
        echo "\nDigite o a situacao para pesquisa 1-ativo 2-inativo: ";
        $codigo = rtrim(fgets(STDIN));
        switch ($codigo) {
            case 1:
                $marca = $this->marcaPDO->findAll();
                foreach ($marca as $key) {
                    $modelo = $this->modeloPDO->findModeloByMarca($key->getId());
                    $key->setModelos($modelo);
                    if (isset($key) && !empty($key)) {
                        print_r($key);
                    } else {
                        echo "\nNao ha marcas!!!";
                    }
                }
                break;
            case 2:
                $marca = $this->marcaPDO->findAllR();
                foreach ($marca as $key) {
                    $modelo = $this->modeloPDO->findModeloByMarca($key->getId());
                    $key->setModelos($modelo);
                    if (isset($key) && !empty($key)) {
                        print_r($key);
                    } else {
                        echo "\nNao ha marcas!!!";
                    }
                }
                break;
            default :
                echo "\n Esta opcao nao esta disponivel!!!";
                goto A;
        }
    }

    //update (case 7)
    private function reativarMarcaPeloNome() {

        A:
        echo "\nDigite a descricao da Marca que você deseja reativar: ";
        $desc = rtrim(fgets(STDIN));
        if (strlen($desc) <= 1) {
            echo "\nEsta marca não existe!!";
            goto A;
        }

        $marca = $this->marcaPDO->findByMarcaR($desc);
        if (isset($marca) && empty($marca)) {
            echo "\nEsta marca não existe!!". print_r($marca);
            goto A;
        }
        print_r($marca[0]);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->marcaPDO->reactivateMarca($marca[0]->getId())) {
                echo "\nCliente reativado.";
            } else {
                echo "\nFalha ao reativar o cliente. Contate o administrador do sistema.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

}

//$marcaController = new MarcaController();
//$marcaController->menuMarca();
