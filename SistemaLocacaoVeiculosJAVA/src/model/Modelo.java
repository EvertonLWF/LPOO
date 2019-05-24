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
public class Modelo {
    private String descricao;
    private Marca marca;
    private boolean status;

    public Modelo(ResultSet resultSet) throws SQLException {
        this.descricao = resultSet.getString("descmodelo");
        this.marca.descricao = resultSet.getString("descmarca");
        this.status = resultSet.getBoolean("status");
    }
    
    public Modelo(Marca marca) {
        this.marca = marca;
    }

    public Modelo(String descricao, Marca marca, boolean status) {
        this.descricao = descricao;
        this.marca = marca;
        this.status = status;
    }

    public String getDescricao() {
        return descricao;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public Marca getMarca() {
        return marca;
    }

    public void setMarca(Marca marca) {
        this.marca = marca;
    }

    public boolean getStatus() {
        return status;
    }

    public void setStatus(boolean status) {
        this.status = status;
    }

    @Override
    public String toString() {
        return "Modelo{" + "descricao=" + this.descricao + ", marca=" + this.marca + ", status=" + this.status + '}';
    }
   
}
