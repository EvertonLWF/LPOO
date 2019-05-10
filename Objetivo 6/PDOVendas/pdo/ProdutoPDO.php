<?php

include "../model/Produto.php";

include "Conexao.php";

/**
 * Descreva aqui a classe ProdutoPDO
 *
 * @author vagner
 */
class ProdutoPDO extends Conexao {
    
    private $conn;
    
    public function __construct() {
        $this->conn = parent::getConexao();
    }
    
    public function insert(){
        
    }
    public function findAll(){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM vendas.produtos ORDER BY nome");
            if($stmt->execute()){
            $produtos = Array();
            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                array_push($produtos, $this->resultSetToProduto($rs));
            }
            
            return $produtos;
        }
        } catch (PDOException $ex) {
            echo "\nExceção no findAll da classe ProdutoPDO: " . $ex->getMessage();
        }
        
    }
    public function update(){
    }    
    
    public function delete(){
        
    }
    
    private function resultSetToProduto($rs){
        $produto = new Produto();
        $produto->setId($rs->id);
        $produto->setNome($rs->nome);
        $produto->setDescricao($rs->descricao);
        $produto->setValor($rs->valor);
        $produto->setSituacao($rs->situacao);
        //$produto->setQuantidade($rs->quantidade);
        
        return $produto;
    }
    
}
