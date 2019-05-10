<?php

include_once "Conexao.php";

include_once "../model/Pedido.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PedidoPDO
 *
 * @author feijo
 */
class PedidoPDO extends Conexao {
    private $conn;
    
    function __construct() {
        $this->conn = parent::getConnect();
    }
    function select(){
        $stmt = $this->conn->prepare("SELECT * FROM pedidos");
        
        if($stmt->execute()){
            $produto = Array();
            while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                array_push($produto,  $this->resultSetPedido($rs));
            }
            return $produto;
        }
    }
    function update(){
        
    }
    function insert(){
        
    }
    function delete(){
        
    }
    private function resultSetPedido($rs){
        
        $pedido = new Pedido;
        $pedido->setId_pedido($rs->id_pedido);
        $pedido->setIdFormaPagamento($rs->idFormaDePagamento);
        $pedido->setEstado($rs->estado);
        $pedido->setDtCriacao($rs->dtCriacao);
        $pedido->setDtModific($rs->dtModificacao);
        $pedido->setTotalPedido($rs->totalPedido);
        $pedido->setSituacao($rs->situacao);
        $pedido->setItemPedido($rs->itemPedido);
        $pedido->setCliente($rs->pedido);
       
        
        
    }

}
