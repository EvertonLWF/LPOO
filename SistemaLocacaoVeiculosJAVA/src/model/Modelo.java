/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author feijo
 */
public class Modelo {
    private String descricao;
    private Marca marca;
    private boolean status;

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

    public boolean isStatus() {
        return status;
    }

    public void setStatus(boolean status) {
        this.status = status;
    }

    @Override
    public String toString() {
        return "Modelo{" + "descricao=" + descricao + ", marca=" + marca + ", status=" + status + '}';
    }
   
}
