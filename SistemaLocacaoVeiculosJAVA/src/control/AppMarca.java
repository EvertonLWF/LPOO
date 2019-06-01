/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import java.util.ArrayList;
import java.util.List;
import model.Marca;
import model.Modelo;
/**
 *
 * @author feijo
 */
public class AppMarca {
    public static void main(String[] args) {
        Marca marca = new Marca();
        marca.setDescricao("ford");
        marca.setSituacao(true);
        marca.setModelosList(null);
        
        
        
        System.out.println(marca);
    }
}
