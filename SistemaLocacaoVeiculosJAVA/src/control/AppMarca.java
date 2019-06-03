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
        List<Marca> marcas = new ArrayList<>();
        List<Modelo> modelos = new ArrayList<>();
        modelos = marcaDAO.findAllModelos("ford");
        marcas = marcaDAO.findByMarca("ford");
        marca.setDescricao(marcas.get(0).getDescricao());
        marca.setSituacao(marcas.get(0).getSituacao());
        marca.setModelosList(modelos);
        System.out.println(marca);
    }
}
