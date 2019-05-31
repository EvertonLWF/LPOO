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
public class Automovel {
    private String placa;
    private String cor;
    private String chassi;
    private int nroPortas;
    private int tipoCombustivel;
    private Long km;
    private Long renavan;
    private double valorLocacao;
    private Modelo modelo;
    private boolean situacao;
    
    public Automovel(Modelo modelo) {
        this.modelo = modelo;
    }

    public Automovel(String placa, String cor, String chassi, int nroPortas, int tipoCombustivel, Long km, Long renavan, double valorLocacao, Modelo modelo, boolean situacao) {
        this.placa = placa;
        this.cor = cor;
        this.chassi = chassi;
        this.nroPortas = nroPortas;
        this.tipoCombustivel = tipoCombustivel;
        this.km = km;
        this.renavan = renavan;
        this.valorLocacao = valorLocacao;
        this.modelo = modelo;
        this.situacao = situacao;
    }

    public Modelo getModelo() {
        return modelo;
    }

    public void setModelo(Modelo modelo) {
        this.modelo = modelo;
    }

    public String getPlaca() {
        return placa;
    }

    public void setPlaca(String placa) {
        this.placa = placa;
    }

    public String getCor() {
        return cor;
    }

    public void setCor(String cor) {
        this.cor = cor;
    }

    public String getChassi() {
        return chassi;
    }

    public void setChassi(String chassi) {
        this.chassi = chassi;
    }

    public int getNroPortas() {
        return nroPortas;
    }

    public void setNroPortas(int nroPortas) {
        this.nroPortas = nroPortas;
    }

    public int getTipoCombustivel() {
        return tipoCombustivel;
    }

    public void setTipoCombustivel(int tipoCombustivel) {
        this.tipoCombustivel = tipoCombustivel;
    }

    public Long getKm() {
        return km;
    }

    public void setKm(Long km) {
        this.km = km;
    }

    public Long getRenavan() {
        return renavan;
    }

    public void setRenavan(Long renavan) {
        this.renavan = renavan;
    }

    public double getValorLocacao() {
        return valorLocacao;
    }

    public void setValorLocacao(double valorLocacao) {
        this.valorLocacao = valorLocacao;
    }

    public boolean getSituacao() {
        return situacao;
    }

    public void setSituacao(boolean situacao) {
        this.situacao = situacao;
    }

    @Override
    public String toString() {
        return "Automovel{" + "placa=" + placa + ", cor=" + cor + ", chassi=" + chassi + ", nroPortas=" + nroPortas + ", tipoCombustivel=" + tipoCombustivel + ", km=" + km + ", renavan=" + renavan + ", valorLocacao=" + valorLocacao + ", modelo=" + modelo + ", situacao=" + situacao + '}';
    }
    
    
    
    
}
