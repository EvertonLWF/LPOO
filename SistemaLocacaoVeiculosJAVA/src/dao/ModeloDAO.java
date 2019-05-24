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
import model.Modelo;

/**
 *
 * @author feijo
 */
public class ModeloDAO extends ConnectDAO {
    private Connection conn;
   
    public List<Modelo> findAll(){
        
        List<Modelo> resultado = new ArrayList<>();
        Statement statement = null;
        ResultSet resultSet = null;
        
        try {
             conn = super.getConnect();
             statement = conn.createStatement();
             resultSet = statement.executeQuery("SELECT * FROM modelo");
             while(resultSet.next()){
                 Modelo modelo = new Modelo(resultSet);
                 resultado.add(modelo);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findAll Modelo "+ex);
        }
        
        return resultado;
        
    }
    public List<Modelo> findByModelo(String descricao){
        List<Modelo> resultado = new ArrayList<>();
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("SELECT * FROM Modelo WHERE descmodelo = ?");
             statement.setString(1, descricao);
             resultSet = statement.executeQuery();
             
             while(resultSet.next()){
                 Modelo marca = new Modelo(resultSet);
                 resultado.add(marca);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findByMarca "+ex);
        }
        catch(Exception ex){
            System.out.println("Erro findByMarca "+ex);
        }
        return resultado;
    }
    
    public boolean insert(Modelo modelo) throws SQLException{
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("INSERT INTO modelo(descmodelo,descmarca,status) VALUES(?,?,?)");
             statement.setString(1, modelo.getDescricao());
             
             statement.setObject(2,modelo.getMarca());
             statement.setBoolean(3, true);
             count = statement.executeUpdate(); 
        }
        catch(SQLException ex){
            System.out.println("Erro INSERT Modelo "+ex);
        }
        catch(Exception ex){
            System.out.println("Erro INSERT Modelo "+ex);
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

    public boolean update(Modelo modelo) throws SQLException{
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE modelo SET descmodelo = ?,descmarca = ?,status = ?");
             statement.setString(1, modelo.getDescricao());
             statement.setString(2, modelo.getMarca().getDescricao());
             statement.setBoolean(3, true);
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
            System.out.println("Erro INSERT Modelo "+ex);
        }
        catch(Exception ex){
            System.out.println("Erro INSERT Modelo "+ex);
        }
        statement.close();
             conn.close();
             
             if(count == 0){
                 return false;
             }else{
                 return true;
             }
    }
     public boolean deletSoft(Modelo modelo) throws SQLException{
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE Modelo SET status = ? WHERE descricao = ?");
             statement.setString(2, modelo.getDescricao());
             statement.setBoolean(1, false);
             count = statement.executeUpdate();            
             
        }
        catch(Exception ex){
            System.out.println("Erro INSERT Marca "+ex);
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
