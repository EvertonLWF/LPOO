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
import model.Automovel;

/**
 *
 * @author feijo
 */
public class AutomovelDAO extends ConnectDAO {
    private Connection conn;
   
    public List<Automovel> findAll(){
        
        List<Automovel> resultado = new ArrayList<>();
        Statement statement = null;
        ResultSet resultSet = null;
        
        try {
             conn = super.getConnect();
             statement = conn.createStatement();
             resultSet = statement.executeQuery("SELECT * FROM automovel");
             while(resultSet.next()){
                 Automovel automovel = new Automovel(resultSet);
                 resultado.add(automovel);
             }
             resultSet.close();
             statement.close();
             conn.close();
             
        }
        catch(SQLException ex){
            System.out.println("Erro findAll Automovel "+ex);
        }
                
        return resultado;
        
    }
    public List<Automovel> findAutomovelByModelo(String descmodelo){
        List<Automovel> resultado = new ArrayList<>();
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("SELECT * FROM automovel WHERE descmodelo = initcap(?)");
             statement.setString(1, descmodelo);
             resultSet = statement.executeQuery();
             
             while(resultSet.next()){
                 Automovel automovel = new Automovel(resultSet);
                 resultado.add(automovel);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findByAutomovel "+ex);
        }
        
        return resultado;
    }
    public List<Automovel> findAutomovelByCor(String cor){
        List<Automovel> resultado = new ArrayList<>();
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("SELECT * FROM automovel WHERE cor LIKE initcap(?)");
             statement.setString(1, cor);
             resultSet = statement.executeQuery();
             
             while(resultSet.next()){
                 Automovel automovel = new Automovel(resultSet);
                 resultado.add(automovel);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findAutomovelByCor "+ex);
        }
        
        return resultado;
    }
    public List<Automovel> findAutomovelByPlaca(String placa){
        List<Automovel> resultado = new ArrayList<>();
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("SELECT * FROM automovel WHERE placa LIKE initcap(?)");
             statement.setString(1, placa);
             resultSet = statement.executeQuery();
             
             while(resultSet.next()){
                 Automovel automovel = new Automovel(resultSet);
                 resultado.add(automovel);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findAutomovelByPlaca "+ex);
        }
        
        return resultado;
    }
    public List<Automovel> findAutomovelByRenavan(Long renavan){
        List<Automovel> resultado = new ArrayList<>();
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("SELECT * FROM automovel WHERE renavan = ?");
             statement.setLong(1, renavan);
             resultSet = statement.executeQuery();
             
             while(resultSet.next()){
                 Automovel automovel = new Automovel(resultSet);
                 resultado.add(automovel);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findAutomovelByRenavan "+ex);
        }
        
        return resultado;
    }
    public boolean insert(Automovel automovel) throws SQLException{
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("INSERT INTO automovel(renavan,placa,cor,numportas,tipo_combust,chassi,valor_locacao,descmodelo,situacao,km) VALUES(?,?,initcap(?),?,?,?,?,initcap(?),?,?");
             statement.setLong(1, automovel.getRenavan());
             statement.setString(2, automovel.getPlaca());
             statement.setString(3, automovel.getCor());
             statement.setInt(4, automovel.getNroPortas());
             statement.setInt(5, automovel.getTipoCombustivel());
             statement.setString(6, automovel.getChassi());
             statement.setDouble(7, automovel.getValorLocacao());
             statement.setString(8, automovel.getModelo().getDescricao());
             statement.setBoolean(9, automovel.getSituacao());
             statement.setLong(10, automovel.getKm());
             
             count = statement.executeUpdate(); 
        }
        catch(SQLException ex){
            System.out.println("Erro INSERT Automovel "+ex);
        }
        catch(Exception ex){
            System.out.println("Erro INSERT Automovel "+ex);
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
    public boolean update(Automovel automovel) throws SQLException{
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE automovel SET renavan =  ?, placa = ?, cor = initcap(?),numportas ?,tipo_combust = ?,chassi = ?,valor_locacao = ?,descmodelo = initcap(?),situacao = ?, km = ?");
             statement.setLong(1, automovel.getRenavan());
             statement.setString(2, automovel.getPlaca());
             statement.setString(3, automovel.getCor());
             statement.setInt(4, automovel.getNroPortas());
             statement.setInt(5, automovel.getTipoCombustivel());
             statement.setString(6, automovel.getChassi());
             statement.setDouble(7, automovel.getValorLocacao());
             statement.setString(8, automovel.getModelo().getDescricao());
             statement.setBoolean(9, automovel.getSituacao());
             statement.setLong(10, automovel.getKm());
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
            System.out.println("Erro INSERT Automovel "+ex);
        }
        catch(Exception ex){
            System.out.println("Erro INSERT Automovel "+ex);
        }
        statement.close();
             conn.close();
             
             if(count == 0){
                 return false;
             }else{
                 return true;
             }
    }
    public boolean deletSoft(Automovel automovel) throws SQLException{
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE automovel SET situacao = ? WHERE renavan = ?");
             statement.setBoolean(1, false);
             statement.setLong(2, automovel.getRenavan());
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
            System.out.println("Erro DeletSoft Automovel "+ex);
        }
        catch(Exception ex){
            System.out.println("Erro DeletSoft Automovel "+ex);
        }
        statement.close();
        conn.close();
             
        if(count == 0){
            return false;
        }else{
            return true;
        }
    }
    public boolean reactivateAutomovel(Automovel automovel) throws SQLException{
        PreparedStatement statement = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE automovel SET situacao = ? WHERE renavan = ?");
             statement.setBoolean(1, true);
             statement.setLong(2, automovel.getRenavan());
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
            System.out.println("Erro reactivateAutomovel "+ex);
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
