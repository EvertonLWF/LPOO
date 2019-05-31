/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.sql.Date;
import java.sql.Time;

/**
 *
 * @author feijo
 */
public class Locacao {
    private Date dtLocacao;
    private Date dtDevolucao;
    private Time hrLocacao;
    private Time hrDevolucao;
    private Long km;
    private double vlCaucao;
    private double vlLocacao;
    private int devolvido;
    private Cliente cliente;
    private Automovel automovel;
    private boolean situacao;

    public Locacao(Cliente cliente, Automovel automovel) {
        this.cliente = cliente;
        this.automovel = automovel;
    }

    public Locacao(Date dtLocacao, Date dtDevolucao, Time hrLocacao, Time hrDevolucao, Long km, double vlCaucao, double vlLocacao, int devolvido, Cliente cliente, Automovel automovel, boolean situacao) {
        this.dtLocacao = dtLocacao;
        this.dtDevolucao = dtDevolucao;
        this.hrLocacao = hrLocacao;
        this.hrDevolucao = hrDevolucao;
        this.km = km;
        this.vlCaucao = vlCaucao;
        this.vlLocacao = vlLocacao;
        this.devolvido = devolvido;
        this.cliente = cliente;
        this.automovel = automovel;
        this.situacao = situacao;
    }

    public Date getDtLocacao() {
        return dtLocacao;
    }

    public void setDtLocacao(Date dtLocacao) {
        this.dtLocacao = dtLocacao;
    }

    public Date getDtDevolucao() {
        return dtDevolucao;
    }

    public void setDtDevolucao(Date dtDevolucao) {
        this.dtDevolucao = dtDevolucao;
    }

    public Time getHrLocacao() {
        return hrLocacao;
    }

    public void setHrLocacao(Time hrLocacao) {
        this.hrLocacao = hrLocacao;
    }

    public Time getHrDevolucao() {
        return hrDevolucao;
    }

    public void setHrDevolucao(Time hrDevolucao) {
        this.hrDevolucao = hrDevolucao;
    }

    public Long getKm() {
        return km;
    }

    public void setKm(Long km) {
        this.km = km;
    }

    public double getVlCaucao() {
        return vlCaucao;
    }

    public void setVlCaucao(double vlCaucao) {
        this.vlCaucao = vlCaucao;
    }

    public double getVlLocacao() {
        return vlLocacao;
    }

    public void setVlLocacao(double vlLocacao) {
        this.vlLocacao = vlLocacao;
    }

    public int getDevolvido() {
        return devolvido;
    }

    public void setDevolvido(int devolvido) {
        this.devolvido = devolvido;
    }

    public Cliente getCliente() {
        return cliente;
    }

    public void setCliente(Cliente cliente) {
        this.cliente = cliente;
    }

    public Automovel getAutomovel() {
        return automovel;
    }

    public void setAutomovel(Automovel automovel) {
        this.automovel = automovel;
    }

    public boolean getSituacao() {
        return situacao;
    }

    public void setSituacao(boolean situacao) {
        this.situacao = situacao;
    }

    @Override
    public String toString() {
        return "Locacao{" + "dtLocacao=" + dtLocacao + ", dtDevolucao=" + dtDevolucao + ", hrLocacao=" + hrLocacao + ", hrDevolucao=" + hrDevolucao + ", km=" + km + ", vlCaucao=" + vlCaucao + ", vlLocacao=" + vlLocacao + ", devolvido=" + devolvido + ", cliente=" + cliente + ", automovel=" + automovel + ", situacao=" + situacao + '}';
    }
    
    
    
    
    
}
