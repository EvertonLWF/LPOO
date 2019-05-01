<?php

/**
 * Description of Conta
 *
 * @author vagner
 */
abstract class Conta {
    private $agencia;
    private $conta;
    private $dataDeCriacao;
    private $titular;
    private $senha;
    private $saldo;
    private $estado;
    
    function __construct($agencia, $codigo, $dataDeCriacao, $titular, $senha, $saldo, $estado) {
        $this->agencia = $agencia;
        $this->conta = $codigo;
        $this->dataDeCriacao = $dataDeCriacao;
        $this->titular = $titular;
        $this->senha = $senha;
        $this->saldo = $saldo;
        $this->estado = $estado;
    }
    
    public function sacar($valor){
        if($valor > 0){
            $this->saldo -= $valor;
        }
    }
    
    public function depositar($valor) {
        if($valor > 0){
            $this->saldo -= $valor;
        }
    }
    
    function getSaldo() {
        return $this->saldo;
    }
    
    public function __toString() {
        return "Conta[agência=$this->agencia, conta=$this->conta, data de criação=$this->dataDeCriacao, titular=$this->titular, senha=$this->senha, saldo=$this->saldo, situação=$this->estado]";
    }

}
