<?php

include_once "ClienteController.php";

include_once "AutomovelController.php";

include_once "LocacaoController.php";

include_once "MarcaController.php";

include_once "ModeloController.php";




/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author feijo
 */
class MainController {
    private $automovelControler;
    private $clienteControler;
    private $locacaoControler;
    private $marcaControler;
    private $modeloControler;
    
    function __construct() {
        $this->automovelControler = new AutomovelController();
        $this->clienteControler = new ClienteController();
        $this->locacaoControler = new LocacaoControler();
        $this->marcaControler = new MarcaController();
        $this->modeloControler = new ModeloController();
    }
    
    public function exibeMenu(){
        //Um front em modo texto controlado por Menu
        $exit = 1;
        while ($exit != 0){
            echo "\n\n--------- Menu ---------";
            echo "\n1. Manter Automovel";
            echo "\n2. Manter Cliente";
            echo "\n3. Realizar Locacao";
            echo "\n4. Manter Marca";
            echo "\n5. Manter Modelo";
            echo "\nOpção (ZERO para sair): ";
            $exit = fgets(STDIN);
            switch ($exit){
                case 0:
                    break;
                case 1:
                    $this->automovelControler->menuAutomovel();
                    break;
                case 2:
                    $this->clienteControler->menuCliente();
                    break;
                case 3:
                    $this->locacaoControler->menuLocacao();
                    break;
                case 4:
                    $this->marcaControler->menuMarca();
                    break;
                case 5:
                    $this->modeloControler->menuMarca();
                    break;
                default:
                    echo "\nOpção inexistente.";
            }
        }
    }
        
}//fim class

//inicializa a app
$mainController = new MainController();
$mainController->exibeMenu();
