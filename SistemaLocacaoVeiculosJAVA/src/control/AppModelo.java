/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;


import dao.AutomovelDAO;
import dao.ModeloDAO;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import model.Modelo;


/**
 *
 * @author feijo
 */
public class AppModelo {
    public static void main(String[] args) throws SQLException {
        ModeloDAO modeloDAO = new ModeloDAO();
        AutomovelDAO automovelDAO = new AutomovelDAO();
        List<Modelo> modelos = new ArrayList<>();
        modelos = modeloDAO.findAll();
        Modelo modelo = modelos.get(1);
        modelo.setAutomoveis(automovelDAO.findAutomovelByModelo(modelos.get(0).getDescricao()));
        System.out.println(modelo);
    }
}
