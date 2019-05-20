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
import model.Marca;

/**
 *
 * @author feijo
 */
public class MarcaDAO extends ConnectDAO{
    private Connection conn;
   
    public List<Marca> findAll(){
        
        List<Marca> resultado = new ArrayList<>();
        Statement statement = null;
        ResultSet resultSet = null;
        
        try {
             conn = super.getConnect();
             statement = conn.createStatement();
             resultSet = statement.executeQuery("SELECT * FROM marca");
             while(resultSet.next()){
                 Marca marca = new Marca(resultSet);
                 resultado.add(marca);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findAll Marca "+ex);
        }
        return resultado;
        
    }
    public List<Marca> findByMarca(String descricao){
        List<Marca> resultado = new ArrayList<>();
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("SELECT * FROM marca WHERE descricao = ?");
             statement.setString(1, descricao);
             resultSet = statement.executeQuery();
             
             while(resultSet.next()){
                 Marca marca = new Marca(resultSet);
                 resultado.add(marca);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(Exception ex){
            System.out.println("Erro findByMarca "+ex);
        }
        return resultado;
    }
    
    public boolean insert(Marca marca){
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("INSERT INTO marca(descricao,status) VALUES(?,?)");
             statement.setString(1, marca.getDescricao());
             statement.setBoolean(2, true);
             int count = statement.executeUpdate();            
             
             resultSet.close();
             statement.close();
             conn.close();
             
             if(count == 0){
                 return false;
             }else{
                 return true;
             }
            
             
        }
        catch(Exception ex){
            System.out.println("Erro INSERT Marca "+ex);
        }
        return false;
    }
}
