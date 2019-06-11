/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
public class Modelo {
    private String descricao;
    private Marca marca = new Marca();
    private boolean situacao;
    private List<Automovel> automoveis = new ArrayList<>();

    public Modelo(Marca marca) {
        this.marca = marca;
    }
    
    public Modelo(ResultSet resultSet) throws SQLException {
        this.descricao = resultSet.getString("descmodelo");
        this.marca.setDescricao(resultSet.getString("descmarca"));
        this.situacao = resultSet.getBoolean("situacao");
    }
    

    public Modelo(String descricao, Marca marca, boolean situacao) {
        this.descricao = descricao;
        this.marca = marca;
        this.situacao = situacao;
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

    public boolean getSituacao() {
        return situacao;
    }

    public void setSituacao(boolean situacao) {
        this.situacao = situacao;
    }
    public List<Automovel> getAutomoveis() {
        return automoveis;
    }

    public void setAutomoveis(List<Automovel> auto) {
        this.automoveis = auto;
    }

    @Override
    public String toString() {
        return "\n Modelo {"+ " DESCRICAO = " + this.descricao + " ,MARCA = " + this.marca.getDescricao() +" AUTOMOVEIS = "+this.automoveis +" , SITUACAO = " + this.situacao + "}";
    }
   
}
