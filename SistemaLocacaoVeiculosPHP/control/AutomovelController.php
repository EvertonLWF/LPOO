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
class AutomovelController{
    private $automovelPDO;
    private $modeloPDO;
    private $marcaPDO;
    
    public function __construct() {
        $this->marcaPDO = new MarcaPDO();
        $this->modeloPDO = new ModeloPDO;
        $this->automovelPDO = new AutomovelPDO;
    }
    public function menuAutomovel(){
        $exit = 1;
        
        while ($exit != 0){
            echo "\r\n\n--------- Submenu Automovel ---------";
            echo "\n1. Inserir Automovel";
            echo "\n2. Alterar Automovel";
            echo "\n3. Excluir Automovel (soft delete)";
            echo "\n4. Listar todos os Automovel";
            echo "\n5. Listar Automovel pelo Renavan";
            echo "\n6. Listar Automovel pela Placa";
            echo "\n7. Listar Automovel pela Cor";
            echo "\n8. Listar Automovel pelo Modelo";
            echo "\n9. Reativar Automovel pelo Renavan";
            echo "\nOpção (ZERO para sair): "; 
            $exit = fgets(STDIN);
            switch ($exit){
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
    private function inserirAuto(){
        $automovel = new Automovel(" ");
        $automovelPDO = new AutomovelPDO();
        echo"\nDigite o renavan do veiculo: ";
        $renavan = fgets(STDIN);
        $respRen = $automovelPDO->findCarByRenavan(rtrim($renavan));
        while(isset($respRen)&& !empty($respRen)){
                echo"\n este renavan ja existe!!!";
                $renavan = fgets(STDIN);
                $respRen = $automovelPDO->findCarByRenavan(rtrim($renavan));
            }
        $automovel->setRenavan($renavan);
        
        echo"\nDigite a placa do veiculo: ";
        $placa = fgets(STDIN);
        $respPl = $automovelPDO->findCarByPlaca(rtrim($placa));
        while(isset($respPl)&& !empty($respPl)){
                echo"\n Esta placa ja esta associada a outro carro!!!";
                $placa = fgets(STDIN);
                $respPl = $automovelPDO->findCarByPlaca(rtrim($placa));
            }
        $automovel->setPlaca($placa);
        
        echo"\nDigite a cor do veiculo: ";
        $automovel->setCor(rtrim(fgets(STDIN)));
        
        echo"\nDigite o numero de portas do veiculo: ";
        $automovel->setNroPortas(rtrim(fgets(STDIN)));
        
        echo"\nDigite o tipo de combustivel do veiculo 1-Gasolina 2-Alcool 3-Flex: ";
        $automovel->setTipoCombustivel(rtrim(fgets(STDIN)));
        
        echo"\nDigite o numero do chassi do veiculo: ";
        $automovel->setChassi(rtrim(fgets(STDIN)));
        
        echo"\nDigite o Valor da locação do veiculo: ";
        $automovel->setValorLocacao(rtrim(fgets(STDIN)));
        
        echo"\nDigite a kilometragem do veiculo: ";
        $automovel->setKm(rtrim(fgets(STDIN)));
        
        echo"\nDigite a descricao do modelo do veiculo: ";
        $modelo = $this->modeloPDO->findByModelo(rtrim(fgets(STDIN)));
        if (isset($modelo)&& !empty($modelo)){
            $automovel->setModelo($modelo[0]);
        }else{
            echo "/n Este modelo não existe!!!!";
            die();
        }
        if($this->automovelPDO->insert($automovel)){
            echo "\nAutomovel salvo.";
        }else{
            echo "\nErro ao salvar.";
        }
    }
    
    //update (case 2)
    private function alterarAuto(){
        echo "\nDigite o renavan do veiculo que você deseja alterar: ";
        $auto = $this->automovelPDO->findCarByRenavan(rtrim(fgets(STDIN)));
        $auto = $auto[0];
        if($auto != null){
            print_r($auto);
            
            echo "\nDigite a placa do veiculo: ";
            $placa = fgets(STDIN);
            if($placa != "\n"){
                $auto->setPlaca(rtrim($placa));
            }
            echo "\nDigite a cor do veiculo: ";
            $cor = fgets(STDIN);
            if($cor != "\n"){
                $auto->setCor(rtrim($cor));
            }
            echo "\nDigite numero de portas do veiculo: ";
            $portas = fgets(STDIN);
            if($portas != "\n"){
                $auto->setNroPortas(rtrim($portas));
            }
            echo "\nDigite o chassi do veiculo: ";
            $chassi = fgets(STDIN);
            if($chassi != "\n"){
                $auto->setChassi(rtrim($chassi));
            }
            echo "\nDigite o valor da locação do veiculo: ";
            $vl = fgets(STDIN);
            if($vl != "\n"){
                $auto->setValorLocacao(rtrim($vl));
            }
            echo "\nDigite descrição do modelo do veiculo: ";
            $desc = fgets(STDIN);
            if($desc != "\n"){
                $modelo = $this->modeloPDO->findByModelo(rtrim($desc));
                $auto->setModelo($modelo[0]->getDescricao());
            }
            
            echo "\nDigite a kilometragem do veiculo: ";
            $km = fgets(STDIN);
            if($km != "\n"){
                $auto->setKm(rtrim($km));
            }
            
            if($this->automovelPDO->update($auto)){
                echo "\nAutomovel alterado.";
            }else{
                echo "\nErro ao alterar o Automovel.";
            }
        }else{
            echo "\nNão há Automovel cadastrados com esse Renavan.";
        }
    }
    
    //update (case 3)
    private function excluirAuto(){
        echo "\nDigite a placa do veiculo que você deseja tornar inativo: ";
        $auto = $this->automovelPDO->findCarByPlaca(rtrim(fgets(STDIN)));
        print_r($auto);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));
        
        if(!strcasecmp($operacao, "s")){
            if($this->automovelPDO->deleteSoft($auto[0])){
                echo "\nAutomovel excluído.";
            }else{
                echo "\nFalha ao desativar veiculo.";
            }       
        }
        if(!strcasecmp($operacao, "n")){
            echo "\nOperação cancelada.";
        }
    }

    //findAll ou SELECT sem filtros (case 4)
    private function listarTodosAutos(){
        print_r($this->automovelPDO->findAll());
    }
    
    //find for name ou SELECT com filtros (case 5)
    private function listarAutoPeloRenavan(){
        echo "\nInforme o renavan do veiculo a ser consultado: ";
        $renavan = rtrim(fgets(STDIN));   
        print_r($this->automovelPDO->findCarByRenavan($renavan));
    }
    private function listarAutoPelaPlaca(){
        echo "\nInforme a placa do veiculo a ser consultado: ";
        $placa = rtrim(fgets(STDIN));   
        print_r($this->automovelPDO->findCarByPlaca($placa));
    }
    private function listarAutoPelaCor(){
        echo "\nInforme a Cor do veiculo a ser consultado: ";
        $cor = rtrim(fgets(STDIN));   
        print_r($this->automovelPDO->findCarByCor($cor));
    }
    private function listarAutoPeloModelo(){
        echo "\nInforme o modelo do veiculo a ser consultado: ";
        $modelo = rtrim(fgets(STDIN));   
        print_r($this->automovelPDO->findCarByModelo($modelo));
    }
    
    
    //update (case 7)
    private function reativarAutoByPlaca(){
        echo "\nDigite a placa do automovel que você deseja reativar: ";
        $auto = $this->automovelPDO->findCarInactivityByPlaca(rtrim(fgets(STDIN)));
        print_r($auto);
        echo "\nConfirmar a operação (s/n)? ";
        $operacao = rtrim(fgets(STDIN));
        
        if(!strcasecmp($operacao, "s")){
            if($this->automovelPDO->reactivateAutomovel($auto[0])){
                echo "\nAutomovel reativado.";
            }else{
                echo "\nFalha ao reativar o Automovel.";
            }       
        }
        if(!strcasecmp($operacao, "n")){
            echo "\nOperação cancelada.";
        }  
    }
}
//$autoController = new AutomovelController();
//$autoController->menuAutomovel();

