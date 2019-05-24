/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import dao.ModeloDAO;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import model.Marca;
import model.Modelo;

/**
 *
 * @author feijo
 */
public class App {
    public static void main(String[] args) throws SQLException {
        Boolean res;
        Marca marca = new Marca();
        marca.setDescricao("Ford");
        marca.setStatus(true);
        ModeloDAO modeloDAO = new ModeloDAO();
        Modelo modelo = new Modelo("Ka",marca,true);
        List<Modelo> resultado = new ArrayList<>();
        
        
        //res = modeloDAO.insert(modelo);
        
        resultado = modeloDAO.findAll();
        System.out.println(resultado);
    }
}
