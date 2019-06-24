<?php

include_once "../model/Marca.php";

include_once "../pdo/ModeloPDO.php";

include_once "../model/Modelo.php";

/**
 * Description of ModeloController
 *
 * @author feijo
 */
class ModeloController {

    private $marcaPDO;
    private $modeloPDO;
    private $modelo;
    private $marca;

    public function __construct() {
        $this->marcaPDO = new MarcaPDO();
        $this->modeloPDO = new ModeloPDO();
    }

    public function menuMarca() {
        $exit = 1;

        while ($exit != 0) {
            echo "\r\n\n--------- Submenu Modelo ---------";
            echo "\n1. Inserir Modelo";
            echo "\n2. Alterar Modelo";
            echo "\n3. Excluir Modelo (soft delete)";
            echo "\n4. Listar todos os Modelo";
            echo "\n5. Listar Modelo pela descricao";
            echo "\n6. Listar Modelo pela situacao";
            echo "\n7. Reativar Modelo pelo descricao";
            echo "\nOpção (ZERO para sair): ";
            $exit = fgets(STDIN);
            switch ($exit) {
                case 0:
                    break;
                case 1:
                    $this->inserirModelo();
                    break;
                case 2:
                    $this->alterarModelo();
                    break;
                case 3:
                    $this->excluirModelo();
                    break;
                case 4:
                    $this->listarTodasModelo();
                    break;
                case 5:
                    $this->listarModeloPelaDescricao();
                    break;
                case 6:
                    $this->listarModeloPelaSituacao();
                    break;
                case 7:
                    $this->reativarModeloPeloNome();
                    break;
                default:
                    echo "\nOpção inexistente.";
            }
        }
    }

    private function inserirModelo() {
        $marca = new Marca();
        $modelo = new Modelo($marca);
        $modelo->setSituacao(true);
        A:
        echo"\nInforme o Nome da Modelo: ";
        $nome = rtrim(fgets(STDIN));
        if (strlen($nome) >= 1) {
            $modelo->setDescricao($nome);
            $modelo->setSituacao(true);
        } else {
            echo "\nModelos em branco nao sao aceitos!!!";
            goto A;
        }
        B:
        echo"\nInforme o Nome da Marca: ";
        $nome = rtrim(fgets(STDIN));
        if (strlen($nome) >= 1) {
            $marca = $this->marcaPDO->findByMarca($nome);
            if (isset($marca) && empty($marca)) {
                echo "\n Marca nao existe!! ";
                goto B;
            } else {
                $modelo->setMarca($marca[0]);
            }
        } else {
            echo "\nMarca em branco nao sao aceitos!!!";
            goto B;
        }
        print_r($modelo);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->modeloPDO->insert($modelo)) {
                echo "\nModelo salva.";
            } else {
                echo "\nFalha ao salvar Modelo. Contate o administrador do sistema.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

    //update (case 2)
    private function alterarModelo() {

        echo"\nInforme o Nome da Modelo: ";
        A:
        $modelo = rtrim(fgets(STDIN));
        $resp = $this->modeloPDO->findByModelo($modelo);
        if (isset($resp) && !empty($resp)) {
            print_r($resp[0]);
        } else {
            echo "\n Esta Modelo não existe";
            goto A;
        }
        if (isset($resp) && empty($resp)) {
            echo "\n nao existe Modelo com este nome!!!";
            goto A;
        }
        echo"\nInforme o Nome da Modelo: ";
        $nome = rtrim(fgets(STDIN));

        if (strlen($nome) >= 1) {
            $resp[0]->setdescricao($nome);
        } else {
            echo "\nModelos em branco nao sao aceitos!!!";
            goto A;
        }
        print_r($resp);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->modeloPDO->update($resp[0])) {
                echo "\nModelo salva.";
            } else {
                echo "\nFalha ao salvar Modelo. Contate o administrador do sistema.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

    //excluir (case 3)
    private function excluirModelo() {
        A:
        echo "\nDigite descricao da Modelo que você deseja tornar inativo: ";
        $desc = rtrim(fgets(STDIN));
        $modelo = $this->modeloPDO->findByModelo($desc);
        
        if (isset($modelo) && empty($modelo)) {
            echo "\n nao existe Modelo com este nome!!!";
            goto A;
        }
        print_r($modelo[0]);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->modeloPDO->deleteSoft($modelo[0]->getDescricao())) {
                echo "\nModelo excluído.";
            } else {
                echo "\nFalha ao deletar Modelo. Contate o administrador do sistema.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

    //findAll ou SELECT sem filtros (case 4)
    private function listarTodasModelo() {
        $modelo = $this->modeloPDO->findAll();

        if (isset($modelo) && !empty($modelo)) {
            foreach ($modelo as $key) {
                $marca = $this->marcaPDO->findMarcaById($key->getMarca());
                $key->setMarca($marca[0]);
                if (isset($key) && !empty($key)) {
                    print_r($key);
                } else {
                    echo "\nNao ha Modelos!!!";
                }
            }
        } else {
            echo "\nNao ha Modelos!!!";
        }
    }

    //find for name ou SELECT com filtros (case 5)
    private function listarModeloPelaDescricao() {

        A:
        echo "\nDigite o Modelo para pesquisa: ";
        $nome = rtrim(fgets(STDIN));
        if (strlen($nome) >= 1) {
            $modelo = $this->modeloPDO->findByModelo($nome);
            if (isset($modelo) && empty($modelo)) {
                echo "\n nao existe modelo com este nome!!!";
                goto A;
            } else {
                foreach ($modelo as $key) {
                    $marca = $this->marcaPDO->findMarcaById($key->getMarca());
                    $key->setMarca($marca[0]);
                    if (isset($key) && !empty($key)) {
                        print_r($key);
                    } else {
                        echo "\nNao ha Modelos!!!";
                    }
                }
            }
        } else {
            echo "\n Digite uma Modelo que não seja em braco!!!";
            goto A;
        }
    }

    //find for id ou SELECT com filtros (case 6)
    private function listarModeloPelaSituacao() {
        A:
        echo "\nDigite o a situacao para pesquisa 1-ativo 2-inativo: ";
        $codigo = rtrim(fgets(STDIN));
        switch ($codigo) {
            case 1:
                $modelo = $this->modeloPDO->findAll();
                if(isset($modelo) && empty($modelo)){
                    echo "\nNao ha Modelos Ativos!!!";
                }
                foreach ($modelo as $key) {
                    $marca = $this->marcaPDO->findMarcaById($key->getMarca());
                    $key->setMarca($marca[0]);
                    if (isset($key) && !empty($key)) {
                        print_r($key);
                    } else {
                        echo "\nNao ha Modelos!!!";
                    }
                }
                break;
            case 2:
                $modelo = $this->modeloPDO->findAllR();
                print_r($modelo);
                if(isset($modelo) && empty($modelo)){
                    echo "\nNao ha Modelos Inativos!!!";
                }
                foreach ($modelo as $key) {
                    $marca = $this->marcaPDO->findMarcaById($key->getMarca());
                    $key->setMarca($marca);
                    if (isset($key) && !empty($key)) {
                        print_r($key);
                    } else {
                        echo "\nNao ha Modelos!!!";
                    }
                }
                break;
            default :
                echo "\n Esta opcao nao esta disponivel!!!";
                goto A;
        }
    }

    //update (case 7)
    private function reativarModeloPeloNome() {

        A:
        echo "\nDigite a descricao da Modelo que você deseja reativar: ";
        $desc = rtrim(fgets(STDIN));
        if (strlen($desc) <= 1) {
            echo "\nEsta Modelo não existe!!";
            goto A;
        }

        $modelo = $this->modeloPDO->findByModeloR($desc);
        if (isset($modelo) && empty($modelo)) {
            echo "\nEsta Modelo não existe!!";
            goto A;
        }
        print_r($modelo[0]);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));

        if (!strcasecmp($operacao, "s")) {
            if ($this->modeloPDO->reactivateModelo($modelo[0]->getId())) {
                echo "\nModelo reativado.";
            } else {
                echo "\nFalha ao reativar o cliente. Contate o administrador do sistema.";
            }
        }
        if (!strcasecmp($operacao, "n")) {
            echo "\nOperação cancelada.";
        }
    }

}

//$modeloControler = new ModeloController();
//$modeloControler->menuMarca();
