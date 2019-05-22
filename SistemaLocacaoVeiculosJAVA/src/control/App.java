/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import dao.MarcaDAO;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import model.Marca;

/**
 *
 * @author feijo
 */
public class App {
    public static void main(String[] args) throws SQLException {
        MarcaDAO marcaDAO = new MarcaDAO();
        Marca marca = new Marca();
        List<Marca> resultado = new ArrayList<>();
        marca.setDescricao("Toyota");
        marca.setStatus(true);
        
       // marcaDAO.insert(marca);
        
        resultado = marcaDAO.findAll();
        System.out.println(resultado);
    }
}
