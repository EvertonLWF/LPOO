/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the  template in the editor.
 */
package model;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author feijo
 */
public class Marca {
    private String descricao;
    private boolean situacao;
    private List<Modelo> modelos = new ArrayList<>();
    
    public Marca() {
    }
    
    public Marca(ResultSet resultSet) throws SQLException {
        this.descricao = resultSet.getString("descricao");
        this.situacao = resultSet.getBoolean("situacao");
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

    public List<Modelo> getModelosList() {
        return modelos;
    }

    public void setModelosList(List<Modelo> ArrayList) {
        this.modelos = ArrayList;
    }
    @Override
    public String toString() {
        return "Marca {" + "DESCRICAO = " + descricao + ", SITUACAO = " + situacao +" MODELOS = "+ modelos +"}";
    }
}