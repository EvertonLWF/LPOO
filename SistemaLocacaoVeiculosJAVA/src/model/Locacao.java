/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.sql.Date;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Time;

/**
 *
 * @author feijo
 */
public class Locacao {
    
    private String id_locacao;
    private Date dtLocacao;
    private Date dtDevolucao;
    private Time hrLocacao;
    private Time hrDevolucao;
    private Long km;
    private double vlCaucao;
    private double vlLocacao;
    private Cliente cliente = new Cliente();
    private Automovel automovel = new Automovel();
    private boolean situacao;
    private boolean devolvido;

    public Locacao(Cliente cliente, Automovel automovel) {
        this.cliente = cliente;
        this.automovel = automovel;
    }

    public Locacao(ResultSet rs) throws SQLException {
        this.id_locacao = rs.getString("id_locacao");
        this.dtLocacao = rs.getDate("dt_locacao");
        this.dtDevolucao = rs.getDate("dt_devolucao");
        this.hrLocacao = rs.getTime("hr_locacao");
        this.hrDevolucao = rs.getTime("hr_devolucao");
        this.km = rs.getLong("km");
        this.vlCaucao = rs.getDouble("valor_caucao");
        this.vlLocacao = rs.getDouble("valor_locacao");
        this.cliente.setCpf(rs.getLong("cpf_cli"));
        this.automovel.setRenavan(rs.getLong("renavan"));
        this.situacao = rs.getBoolean("situacao");
        this.devolvido = rs.getBoolean("devolvido");
    }
    

    public Locacao(Date dtLocacao, Date dtDevolucao, Time hrLocacao, Time hrDevolucao, Long km, double vlCaucao, double vlLocacao, Boolean devolvido, Cliente cliente, Automovel automovel, boolean situacao) {
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

    public String getId_locacao() {
        return id_locacao;
    }

    public void setId_locacao(String id_locacao) {
        this.id_locacao = id_locacao;
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

    public Boolean getDevolvido() {
        return devolvido;
    }

    public void setDevolvido(Boolean devolvido) {
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
        return "Locacao{" + "\n\tdtLocacao = " + dtLocacao + "\n\tdtDevolucao = " + dtDevolucao + "\n\thrLocacao = " + hrLocacao + "\n\thrDevolucao = " + hrDevolucao + "\n\tkm = " + km + "\n\tvlCaucao = " + vlCaucao + "\n\tvlLocacao = " + vlLocacao + "\n\tDevolvido = " + devolvido + "\n\tCliente = " + cliente + "\n\tAutomovel = " + automovel + "\n\tsituacao = " + situacao + "\n}";
    }
}
