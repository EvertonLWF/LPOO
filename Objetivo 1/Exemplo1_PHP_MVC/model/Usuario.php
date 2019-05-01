<?php

/**
 * Description of Usuario
 *
 * @author vpsil
 */
class Usuario {
    
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
    
    public function __toString() {
        return "Usuario[nome=$this->nome, sobrenome=$this->sobrenome, email=$this->email, senha=$this->senha]";
    }

}
