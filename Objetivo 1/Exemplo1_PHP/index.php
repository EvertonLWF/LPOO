<?php

//Criação de classe
class Carro{
    //atributos
    public $ano;
    public $modelo;
    public $marca;
    
    //construtor de objetos
    public function __construct($ano, $modelo, $marca) {
        $this->ano = $ano;
        $this->modelo = $modelo;
        $this->marca = $marca;
    }
}//fim classe

class Usuario{

    public $nome;
    public $sobrenome;
    public $email;
    public $senha;
    
    public function __construct($nome, $sobrenome, $email, $senha) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->senha = $senha;
    }    
}//fim classe

//instanciou objetos da classe Carro
$objeto1 = new Carro(2019, "Uno", "Fiat");
print_r($objeto1);
$objeto2 = new Carro(2018, "Uno", "Fiat");
print_r($objeto2);
$objeto3 = new Carro(2017, "Uno", "Fiat");
print_r($objeto3);
$objeto4 = new Carro(2016, "Uno", "Fiat");
print_r($objeto4);
$objeto5 = new Carro(2015, "Uno", "Fiat");
print_r($objeto5);

//instanciou objetos da classe Usuario
$objeto6 = new Usuario("João", "de Deus", "email_joao@dominio.com", "senha5");
print_r($objeto1);
$objeto7 = new Usuario("Maria", "da Cruz", "email_maria@dominio.com", "senha11");
print_r($objeto2);
