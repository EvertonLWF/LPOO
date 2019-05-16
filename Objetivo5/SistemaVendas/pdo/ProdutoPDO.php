<?php

include_once "../model/Produto.php";

include_once "Conexao.php";

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

    public function insert(Produto $produto){
        $stmt = $this->conn->prepare('INSERT INTO produtos (nome,valor,descricao,situacao,quantidade) VALUES(?,?,?,?,?)');
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getValor());
        $stmt->bindValue(3, $produto->getDescricao());
        $stmt->bindValue(4, $produto->getSituacao());
        $stmt->bindValue(5, $produto->getQuantidade());
        return $stmt;
    }
    
    public function select(){
        
        $stmt = $this->conn->prepare("SELECT * FROM produtos");
        if($stmt->execute()){
            $produtos = Array();
            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
               array_push($produtos, $this->resultSetProduto($rs));
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
            $produto->setId_produto($rs->id_produto);
            $produto->setNome($rs->nome);
            $produto->setDescricao($rs->descricao);
            $produto->setSituacao($rs->situacao);
            $produto->setValor($rs->valor);
            return $produto;
        }
    
}
