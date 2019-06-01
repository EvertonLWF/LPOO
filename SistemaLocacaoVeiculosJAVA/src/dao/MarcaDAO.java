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
             statement = conn.prepareStatement("SELECT * FROM marca WHERE descricao = initcap(?)");
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
        catch(SQLException ex){
            System.out.println("Erro findByMarca "+ex);
        }
        return resultado;
    }
    public List<Modelo> findAllModelos(String descricao){
        List<Modelo> resultado = new ArrayList<>();
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("SELECT * FROM modelo,marca WHERE modelo.descmarca = initcap(?)");
             statement.setString(1, descricao);
             resultSet = statement.executeQuery();
             
             while(resultSet.next()){
                 Modelo modelo = new Modelo(resultSet);
                 resultado.add(modelo);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findByModelo em Marca "+ex);
        }
        return resultado;
    }
    
    public boolean insert(Marca marca) throws SQLException{
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("INSERT INTO marca(descricao,situacao) VALUES(initcap(?),?)");
             statement.setString(1, marca.getDescricao());
             statement.setBoolean(2, true);
             count = statement.executeUpdate(); 
                                
        }
        catch(SQLException ex){
            System.out.println("Erro INSERT Marca "+ex);
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

    public boolean update(Marca marca,String key) throws SQLException{
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE marca SET descricao = initcap(?),situacao = ? WHERE descricao = initcap(?)");
             statement.setString(1, marca.getDescricao());
             statement.setBoolean(2, true);
             statement.setString(3, key);
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
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
    public boolean deletSoft(Marca marca) throws SQLException{
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE marca SET situacao = ? WHERE descricao = initcap(?)");
             statement.setBoolean(1, false);
             statement.setString(2, marca.getDescricao());
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
            System.out.println("Erro deletSoft "+ex);
        }
        statement.close();
        conn.close();
             
        if(count == 0){
            return false;
        }else{
            return true;
        }
    }
    public boolean reactivateMarca(Marca marca) throws SQLException{
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE marca SET situacao = ? WHERE descricao = initcap(?)");
             statement.setBoolean(1, true);
             statement.setString(2, marca.getDescricao());
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
            System.out.println("Erro reactivateMarca "+ex);
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
