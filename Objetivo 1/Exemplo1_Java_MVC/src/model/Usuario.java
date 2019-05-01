/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author vpsil
 */
public class Usuario {
    public String nome;
    public String sobrenome;
    public String email;
    public String senha;
    
    public Usuario(String nome,String sobrenome,String email,String senha) {
        this.nome = nome;
        this.sobrenome = sobrenome;
        this.email = email;
        this.senha = senha;
    }

    @Override
    public String toString() {
        return "Usuario{" + "nome=" + nome + ", sobrenome=" + sobrenome + ", email=" + email + ", senha=" + senha + '}';
    }
}
