<?php

include_once "../model/Produto.php";

include_once "Conexao.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoPDO
 *
 * @author feijo
 */
class ProdutoPDO extends Conexao{
    private $conn;
            
    function __construct() {
        $this->conn = parent::getConnect();
    }

    public function insert(){
        
    }
    
    public function select(){
        
        $stmt = $this->conn->prepare("SELECT * FROM produtos");
        if($stmt->execute()){
            $produtos = Array();
            $result = $stmt->fetchAll();

            foreach ($result as $key) {
                array_push($produtos, $key);

            }
            return $produtos;
        }
    }
    public function update($produto){
        
    }
    
    public function delete($produto){
        
    }
    private function resultSetProduto($rs){
            $produto = new Produto();
            $produto->setId_produto($rs->id);
            $produto->setNome_produto($rs->nome);
            $produto->setDescricao_produto($rs->descricao);
            $produto->setSituacao_produto($rs->situacao);
            $produto->setValor_produto($rs->valor);
            $produto->set_produto($rs->valor);
            return $produto;
        }
    
}
