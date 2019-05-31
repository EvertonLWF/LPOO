/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import dao.ClienteDAO;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import model.Cliente;

/**
 *
 * @author feijo
 */
public class AppCliente {
    public static void main(String[] args) throws SQLException {
        Cliente cliente = new Cliente();
        ClienteDAO clienteDAO = new ClienteDAO();
        List<Cliente> resultado = new ArrayList<>();
       
        cliente.setCpf(123123123l);
        cliente.setNome("Zé");
        cliente.setEmail("Ze@Bolacha");
        cliente.setEnd("Rua A");
        cliente.setTel("987654321");
        cliente.setSituacao(true);
        
        //clienteDAO.insert(cliente);
        
        resultado = clienteDAO.findAll();
        System.out.println(resultado);
    }
}
