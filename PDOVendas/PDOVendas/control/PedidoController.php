<?php

/**
 * Descreva aqui a classe PedidoController
 *
 * @author vagner
 */
class PedidoController {
    
    private $pedidoPDO;
    
    public function __construct() {
        //$this->pedidoPDO = new PedidoPDO;
    }
    
    public function exibeMenu(){
         //Um front em modo texto controlado por Menu
        $exit = 1;
        while ($exit != 0){
            echo "\n\n--------- Submenu Pedido ---------";
                echo "\n1. Vender (inserir pedido): ";
                echo "\n2. Faturar Pedido (alterar pedido): ";
                echo "\n3. Entregar Pedido (alterar pedido): ";
                echo "\n4. Excluir Pedido (soft delete): ";
                echo "\n5. Listar todos os pedidos: ";
                echo "\n6. Listar pedidos por cliente: ";
                echo "\n7. Listar pedido pelo código: ";
                echo "\nOpção (ZERO para sair): "; 
                $exit = fgets(STDIN);
                switch ($exit){
                    case 0:
                        break;
                    case 1:
                        $this->vender();
                        break;
                    case 2:
                        $this->faturarPedido();
                        break;
                    case 3:
                        $this->entregarPedido();
                        break;
                    case 4:
                        $this->excluirPedido();
                        break;
                    case 5:
                        $this->listarTodosPedidos();
                        break;
                    case 6:
                        $this->listarPedidoPorCliente();
                        break;
                    case 7:
                        $this->listarPedidoPorId();
                        break;
                    default:
                        echo "\nOpção inexistente.";
                }
        } //fim Menu
    }
    
    private function vender(){
        echo "\nEm desenvolvimento.";
    }
    
    private function faturarPedido(){
        echo "\nEm desenvolvimento.";
    }
    
    private function entregarPedido(){
        echo "\nEm desenvolvimento.";
    }
    
    private function excluirPedido(){
        echo "\nEm desenvolvimento.";
    }
    
    private function listarTodosPedidos(){
        echo "\nEm desenvolvimento.";
    }
    
    private function listarPedidoPorCliente(){
        echo "\nEm desenvolvimento.";
    }
    
    private function listarPedidoPorId(){
        echo "\nEm desenvolvimento.";   
    }
    
}//fim class
