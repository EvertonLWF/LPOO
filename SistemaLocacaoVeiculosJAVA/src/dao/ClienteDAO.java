/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import model.Cliente;

/**
 *
 * @author feijo
 */
public class ClienteDAO extends ConnectDAO {
        private Connection conn;
   
    public List<Cliente> findAll(){
        
        List<Cliente> resultado = new ArrayList<>();
        Statement statement = null;
        ResultSet resultSet = null;
        
        try {
             conn = super.getConnect();
             statement = conn.createStatement();
             resultSet = statement.executeQuery("SELECT * FROM clientes");
             while(resultSet.next()){
                 Cliente cliente = new Cliente(resultSet);
                 resultado.add(cliente);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findAll Cliente "+ex);
        }
        return resultado;
        
    }
    public List<Cliente> findByMarca(String descricao){
        List<Cliente> resultado = new ArrayList<>();
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("SELECT * FROM clientes WHERE descricao = ?");
             statement.setString(1, descricao);
             resultSet = statement.executeQuery();
             
             while(resultSet.next()){
                 Cliente cliente = new Cliente(resultSet);
                 resultado.add(cliente);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findByCliente "+ex);
        }
        return resultado;
    }
    
    public boolean insert(Cliente cliente) throws SQLException{
        PreparedStatement statement = null;
         
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("INSERT INTO clientes(cpf_cli,nome_cli,end_cli,tel_cliente,email_cli,situacao) VALUES(?,?,?,?,?,?)");
             statement.setLong(1, cliente.getCpf());
             statement.setString(2, cliente.getNome());
             statement.setString(3, cliente.getEnd());
             statement.setString(4, cliente.getTel());
             statement.setString(5, cliente.getEmail());
             statement.setBoolean(6, true);
             count = statement.executeUpdate(); 
                
                                
        }
        catch(SQLException ex){
            System.out.println("Erro INSERT Clientes "+ex);
        }
        //resultSet.close();
        statement.close();
        conn.close();
        
        if(count == 0){
            return false;
        }else{
            return true;
        }
    }

    public boolean update(Cliente cliente) throws SQLException{
        PreparedStatement statement = null;
        
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE clientes SET cpf_cli = ?,nome_cli = ?,end_cli = ?,tel_cliente = ?,email_cli = ?,situacao = ? WHERE cpf_cli = ?");
             statement.setLong(1, cliente.getCpf());
             statement.setString(2, cliente.getNome());
             statement.setString(3, cliente.getEnd());
             statement.setString(4, cliente.getTel());
             statement.setString(5, cliente.getEmail());
             statement.setBoolean(6, true);
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
            System.out.println("Erro INSERT Cliente "+ex);
        }
        statement.close();
        conn.close();
             
        if(count == 0){
            return false;
        }else{
            return true;
        }
    }
    public boolean deletSoft(int cpf) throws SQLException{
        PreparedStatement statement = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE cliente SET situacao = ? WHERE cpf_cli = ?");
             statement.setBoolean(1, false);
             statement.setLong(2, cpf);
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
            System.out.println("Erro deletSoft cliente "+ex);
        }
        statement.close();
        conn.close();
             
        if(count == 0){
            return false;
        }else{
            return true;
        }
    }
    public boolean reactivateClient(int cpf) throws SQLException{
        PreparedStatement statement = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE cliente SET situacao = ? WHERE cpf_cli = ?");
             statement.setBoolean(1, true);
             statement.setLong(2, cpf);
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
            System.out.println("Erro ReactivityCliente "+ex);
        }
        statement.close();
        conn.close();
             
        if(count == 0){
            return false;
        }else{
            return true;
        }
    }
}
