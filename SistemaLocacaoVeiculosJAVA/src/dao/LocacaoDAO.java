/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

import java.math.BigInteger;
import static java.nio.charset.StandardCharsets.UTF_8;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.sql.Connection;
import java.sql.Date;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import model.Locacao;


/**
 *
 * @author feijo
 */
public class LocacaoDAO extends ConnectDAO{
    private Connection conn;
   
    public List<Locacao> findAll(){
        
        List<Locacao> resultado = new ArrayList<>();
        Statement statement = null;
        ResultSet resultSet = null;
        
        try {
             conn = super.getConnect();
             statement = conn.createStatement();
             resultSet = statement.executeQuery("SELECT * FROM locacao");
             while(resultSet.next()){
                 Locacao locacao = new Locacao(resultSet);
                 resultado.add(locacao);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findAll Locacao "+ex);
        }
        
        return resultado;
        
    }
    public List<Locacao> findByDate(Date date){
        List<Locacao> resultado = new ArrayList<>();
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("SELECT * FROM locacao WHERE locacao = ?");
             statement.setDate(1, date);
             resultSet = statement.executeQuery();
             
             while(resultSet.next()){
                 Locacao locacao = new Locacao(resultSet);
                 resultado.add(locacao);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findLocacaoByDate "+ex);
        }
        return resultado;
    }
    public List<Locacao> findByCliente(Long cpf){
        List<Locacao> resultado = new ArrayList<>();
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("SELECT * FROM locacao WHERE cpf_cli = ? AND devolvido = FALSE");
             statement.setLong(1, cpf);
             resultSet = statement.executeQuery();
             
             while(resultSet.next()){
                 Locacao locacao = new Locacao(resultSet);
                 resultado.add(locacao);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findLocacaoByCliente "+ex);
        }
        return resultado;
    }
    public List<Locacao> findByRenavan(Long renavan){
        List<Locacao> resultado = new ArrayList<>();
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("SELECT * FROM locacao WHERE renavan = ? AND devolvido = FALSE");
             statement.setLong(1, renavan);
             resultSet = statement.executeQuery();
             
             while(resultSet.next()){
                 Locacao locacao = new Locacao(resultSet);
                 resultado.add(locacao);
             }
             resultSet.close();
             statement.close();
             conn.close();
        }
        catch(SQLException ex){
            System.out.println("Erro findLocacaoByRenavan "+ex);
        }
        return resultado;
    }
    
    public boolean insert(Locacao locacao) throws SQLException, NoSuchAlgorithmException{
        
        
        PreparedStatement statement = null;
        ResultSet resultSet = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("INSERT INTO locacao(id_locacao,dt_locacao,hr_locacao,dt_devolucao,hr_devolucao,km,valor_caucao,valor_locacao,cpf_cli,renavan,situacao,devolvido) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
             statement.setString(1,locacao.getId_locacao());
             statement.setDate(2,locacao.getDtLocacao());
             statement.setTime(3,locacao.getHrLocacao());
             statement.setDate(4,locacao.getDtLocacao());
             statement.setTime(5,locacao.getHrDevolucao());
             statement.setLong(6,locacao.getAutomovel().getKm());
             statement.setDouble(7,locacao.getVlCaucao());
             statement.setDouble(8,locacao.getVlLocacao());
             statement.setDouble(9,locacao.getCliente().getCpf());
             statement.setDouble(10,locacao.getAutomovel().getRenavan());
             statement.setBoolean(11,locacao.getSituacao());
             statement.setBoolean(12,locacao.getDevolvido());
             
             count = statement.executeUpdate(); 
                                
        }
        catch(SQLException ex){
            System.out.println("Erro INSERT Locacao "+ex);
        }
        resultSet.close();
        statement.close();
        conn.close();
        
        if(count == 0){
            return false;
        }else{
            return true;
        }
    }

    public boolean update(Locacao locacao,String key) throws SQLException{
        PreparedStatement statement = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE locacao SET dt_devolucao = ?,hr_devolucao = ?,km = ?,valor_caucao= ?,valor_locacao = ?,cpf_cli = ?,renavan = ?, devolvido = ? WHERE id_locacao = ?");
             statement.setDate(1, locacao.getDtDevolucao());
             statement.setTime(2, locacao.getHrDevolucao());
             statement.setLong(3, locacao.getKm());
             statement.setDouble(4, locacao.getVlCaucao());
             statement.setDouble(5, locacao.getVlLocacao());
             statement.setLong(6, locacao.getCliente().getCpf());
             statement.setLong(7, locacao.getAutomovel().getRenavan());
             statement.setBoolean(8, locacao.getDevolvido());
             statement.setString(9, locacao.getId_locacao());
             
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
            System.out.println("Erro INSERT Locacao "+ex);
        }
        statement.close();
        conn.close();
             
        if(count == 0){
            return false;
        }else{
            return true;
        }
    }
    public boolean deletSoft(Locacao locacao) throws SQLException{
        PreparedStatement statement = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE locacao SET situacao = ? WHERE id_locacao = ?");
             statement.setBoolean(1, false);
             statement.setString(2, locacao.getId_locacao());
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
            System.out.println("Erro deletSoft Locacao "+ex);
        }
        statement.close();
        conn.close();
             
        if(count == 0){
            return false;
        }else{
            return true;
        }
    }
    public boolean reactivateMarca(Locacao locacao) throws SQLException{
        PreparedStatement statement = null;
        int count = 0;
        try {
             conn = super.getConnect();
             statement = conn.prepareStatement("UPDATE locacao SET situacao = ? WHERE id_locacao = ?");
             statement.setBoolean(1, true);
             statement.setString(2, locacao.getId_locacao());
             count = statement.executeUpdate();            
             
        }
        catch(SQLException ex){
            System.out.println("Erro reactivate Locacao "+ex);
        }
        statement.close();
        conn.close();
             
        if(count == 0){
            return false;
        }else{
            return true;
        }
    }
    public String md5(String data) throws NoSuchAlgorithmException {
        MessageDigest md5 = MessageDigest.getInstance("MD5");
        byte[] digest = md5.digest(data.getBytes(UTF_8));
        return String.format("%032x%n", new BigInteger(1, digest));
    }
}
