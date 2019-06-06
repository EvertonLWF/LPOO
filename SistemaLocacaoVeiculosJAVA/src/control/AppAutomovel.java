/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import dao.AutomovelDAO;
import dao.MarcaDAO;
import dao.ModeloDAO;
import java.util.ArrayList;
import java.util.List;
import model.Automovel;
import model.Marca;
import model.Modelo;

/**
 *
 * @author feijo
 */
public class AppAutomovel {
    public static void main(String[] args) {
        MarcaDAO marcaDAO = new MarcaDAO();
        List<Marca> marcas = marcaDAO.findByMarca("ford");
        Marca marca = marcas.get(0);
        
        ModeloDAO modeloDAO = new ModeloDAO();
        List<Modelo> modelos = modeloDAO.findByModelo("ka");
        Modelo modelo = modelos.get(0);
        modelo.setMarca(marca);
        
        List<Automovel> automoveis = new ArrayList<>();
        AutomovelDAO automovelDAO = new AutomovelDAO();
        automoveis = automovelDAO.findAll();
        System.out.println(automoveis);
    }
}
