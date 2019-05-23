<?php

include_once "../pdo/ClientePDO.php";

/**
 * Descreva aqui a classe ClienteController
 *
 * @author vagner
 */
class ClienteController {
    private $clientePDO;
    
    public function __construct() {
        $this->clientePDO = new ClientePDO();
    }
    
    public function exibeMenu(){
        //Um front em modo texto controlado por Menu
        $exit = 1;
        while ($exit != 0){
            echo "\n\n--------- Submenu Produto ---------";
            echo "\n1. Inserir Cliente";
            echo "\n2. Alterar Cliente";
            echo "\n3. Excluir Cliente (soft delete)";
            echo "\n4. Listar todos os clientes";
            echo "\n5. Listar clientes pelo nome";
            echo "\n6. Listar cliente pelo código";
            echo "\n7. Reativar cliente pelo código";
            echo "\nOpção (ZERO para sair): "; 
            $exit = fgets(STDIN);
            switch ($exit){
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
                    $this->listarClientePeloCodigo();
                    break;
                case 7:
                    $this->reativarClientePeloCodigo();
                    break;
                default:
                    echo "\nOpção inexistente.";
            }
        } //fim Menu
    }
    
    //insert (case 1)
    private function inserirCliente(){
        echo "\nEm desenvolvimento.";
    }
    
    //update (case 2)
    private function alterarCliente(){
        echo "\nEm desenvolvimento.";
    }
    
    //update (case 3)
    private function excluirCliente(){
        echo "\nEm desenvolvimento.";
    }

    //findAll ou SELECT sem filtros (case 4)
    private function listarTodosClientes(){
        echo "\nEm desenvolvimento.";
    }
    
    //find for name ou SELECT com filtros (case 5)
    private function listarClientesPeloNome(){
        echo "\nEm desenvolvimento.";
    }
    
    //find for id ou SELECT com filtros (case 6)
    private function listarClientePeloCodigo(){
        echo "\nEm desenvolvimento.";
    }
    
    //update (case 7)
    private function reativarClientePeloCodigo(){
        echo "\nEm desenvolvimento.";
    }
}
