<?php

include_once "../pdo/ModeloPDO.php";

include_once "../pdo/MarcaPDO.php";

include_once "../model/Marca.php";


class MarcaController{
    
    private $marcaPDO;
    private $modeloPDO;
    private $marca;
    
    public function __construct() {
        $this->marcaPDO = new MarcaPDO;
        $this->modeloPDO = new ModeloPDO;
        $this->marca = new Marca;
    }
    public function menuMarca(){
        $exit = 1;
        
        while ($exit != 0){
            echo "\r\n\n--------- Submenu Marca ---------";
            echo "\n1. Inserir Marca";
            echo "\n2. Alterar Marca";
            echo "\n3. Excluir Marca (soft delete)";
            echo "\n4. Listar todos as Marca";
            echo "\n5. Listar Marca pela descricao";
            echo "\n6. Listar Marca pela situacao";            
            echo "\nOpção (ZERO para sair): "; 
            $exit = fgets(STDIN);
            switch ($exit){
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
                default:
                    echo "\nOpção inexistente.";
            }
        }
    }
}