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
    protected boolean status;

    public Marca() {
    }
    
    public Marca(ResultSet resultSet) throws SQLException {
        this.descricao = resultSet.getString("descricao");
        //this.status = resultSet.getBoolean("status");
    }

    public Marca(String descricao, boolean status) {
        this.descricao = descricao;
        this.status = status;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public boolean getStatus() {
        return status;
    }

    public void setStatus(boolean status) {
        this.status = status;
    }

    @Override
    public String toString() {
        return "Marca {" + "descricao = " + descricao + ", status = " + status +"}";
    }
}