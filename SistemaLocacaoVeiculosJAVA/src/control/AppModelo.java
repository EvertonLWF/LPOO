/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import dao.ModeloDAO;
import java.sql.SQLException;
import model.Marca;
import model.Modelo;

/**
 *
 * @author feijo
 */
public class AppModelo {
    public static void main(String[] args) throws SQLException {
        Marca marca = new Marca();
        marca.setDescricao("ford");
        Modelo modelo = new Modelo(marca);
        modelo.setDescricao("fiesta");
        modelo.setSituacao(true);
        ModeloDAO modeloDAO = new ModeloDAO();
        
        modeloDAO.insert(modelo);
        System.out.println(modeloDAO.findAll());
    }
}
