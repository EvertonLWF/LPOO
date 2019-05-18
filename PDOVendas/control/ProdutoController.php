<?php

include_once "../model/Produto.php";
include_once "../pdo/ProdutoPDO.php";

class ProdutoController{
    private $produtoPDO;
    
    public function __construct() {
        $this->produtoPDO = new ProdutoPDO();
    }
    
    public function exibeMenu(){
        //Um front em modo texto controlado por Menu
        $exit = 1;
        while ($exit != 0){
            echo "\n\n--------- Submenu Produto ---------";
            echo "\n1. Inserir Produto";
            echo "\n2. Alterar Produto";
            echo "\n3. Excluir Produto (soft delete)";
            echo "\n4. Listar todos os produtos";
            echo "\n5. Listar produtos pelo nome";
            echo "\n6. Listar produto pelo código";
            echo "\nOpção (ZERO para sair): "; 
            $exit = fgets(STDIN);
            switch ($exit){
                case 0:
                    break;
                case 1:
                    $this->inserirProduto();
                    break;
                case 2:
                    $this->alterarProduto();
                    break;
                case 3:
                    $this->excluirProduto();
                    break;
                case 4:
                    $this->listarTodosProdutos();
                    break;
                case 5:
                    $this->listarProdutosPeloNome();
                    break;
                case 6:
                    $this->listarProdutosPeloCodigo();
                    break;
                default:
                    echo "\nOpção inexistente.";
            }
        } //fim Menu
    }
    
    //insert (case 1)
    private function inserirProduto(){
        $produto = new Produto();
        echo"\nNome do Produto: ";
        $produto->setNome(fgets(STDIN));
        echo"\nDescrição do Produto: ";
        $produto->setDescricao(fgets(STDIN));
        echo"\nValor do Produto (sistema americano): ";
        $produto->setValor(fgets(STDIN));
        $produto->setSituacao(true); //nasce como registro válido no bd
        echo"\nQuantidade em estoque: ";
        $produto->setQuantidade(fgets(STDIN));
        if($this->produtoPDO->insert($produto)){
            echo "\nProduto salvo.";
        }else{
            echo "\nErro ao salvar. Contate o administrador do sistema.";
        }
    }
    
    //update (case 2)
    private function alterarProduto(){
        echo "\nEm desenvolvimento.";
    }
    
    //update (case 3)
    private function excluirProduto(){
        echo "\nEm desenvolvimento.";
    }

    //findAll ou SELECT sem filtros (case 4)
    private function listarTodosProdutos(){
        //findAll (SELECT)
        print_r($this->produtoPDO->findAll());
    }
    
    //update (case 5)
    private function listarProdutosPeloNome(){
        echo "\nEm desenvolvimento.";
    }
    
    //update (case 6)
    private function listarProdutosPeloCodigo(){
        echo "\nEm desenvolvimento.";
    }
    
}
   
    



