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
import model.Modelo;

/**
 *
 * @author feijo
 */
public class AppMarca {
    public static void main(String[] args) throws SQLException {
        Marca marca = new Marca();
        MarcaDAO marcaDAO = new MarcaDAO();
        
        //marcaDAO.insert(marca);
        List<Modelo> modelos = marcaDAO.findAllModelos("ford");
        
        marca.setDescricao("ford");
        marca.setSituacao(true);
        marca.setModelosList(modelos);
        
        System.out.println(marca);
    }
}
