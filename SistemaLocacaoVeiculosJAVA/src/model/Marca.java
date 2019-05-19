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
public class Marca {
    private String descricao;
    private boolean status;
    public Marca() {
    
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

    public boolean isStatus() {
        return status;
    }

    public void setStatus(boolean status) {
        this.status = status;
    }

    @Override
    public String toString() {
        return "Marca{" + "descricao=" + descricao + ", status=" + status + '}';
    }   
}
