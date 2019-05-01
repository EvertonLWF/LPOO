/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author vpsil
 */
public class Carro {
    //atributos
    public int ano;
    public String modelo;
    public String marca;
    
    //construtor de objetos
    public Carro(){}
    
    public Carro(int ano, String modelo, String marca) {
        this.ano = ano;
        this.modelo = modelo;
        this.marca = marca;
    }

    @Override
    public String toString() {
        return "Carro{" + "ano=" + ano + ", modelo=" + modelo + ", marca=" + marca + '}';
    }
}
