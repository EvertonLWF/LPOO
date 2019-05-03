/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.sql.ResultSet;
import java.sql.SQLException;

/**
 *
 * @author feijo
 */
public class UserDAO {
    private String nome;
    private String senha;

    public UserDAO() {
    }
    public UserDAO(ResultSet rs) throws SQLException {
        this.nome = rs.getString("nome");
        this.senha = rs.getString("datanasc");
        
    }

    public UserDAO(String nome, String nasc) {
        this.nome = nome;
        this.senha = nasc;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getNasc() {
        return senha;
    }

    public void setNasc(String nasc) {
        this.senha = nasc;
    }

    @Override
    public String toString() {
        return "User{" + "nome=" + nome + ", senha=" + senha + '}';
    }
    
    
    
}