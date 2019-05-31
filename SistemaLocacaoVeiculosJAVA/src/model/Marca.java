/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the  template in the editor.
 */
package model;

import java.sql.ResultSet;
import java.sql.SQLException;

/**
 *
 * @author feijo
 */
public class Marca {
    protected String descricao;
    protected boolean situacao;

    public Marca() {
    }
    
    public Marca(ResultSet resultSet) throws SQLException {
        this.descricao = resultSet.getString("descricao");
    }

    public Marca(String descricao, boolean situacao) {
        this.descricao = descricao;
        this.situacao = situacao;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public boolean getSituacao() {
        return situacao;
    }

    public void setSituacao(boolean situacao) {
        this.situacao = situacao;
    }

    @Override
    public String toString() {
        return "Marca {" + "DESCRICAO = " + descricao + ", SITUACAO = " + situacao +"}";
    }
}