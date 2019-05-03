/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author feijo
 */
public class Query extends Conexao {
    List<UserDAO> resultado = new ArrayList<>();
    
    public Query(String user, String senha, String url, String query) {
        super(user, senha, url, query);
    }
    
    public List<UserDAO> select(String query){
        List<UserDAO> resultado = new ArrayList<>();
        Connection con = null;
        PreparedStatement stmt = null;
        try{
            con = connect();
            stmt = con.prepareStatement(query);
            ResultSet rs = stmt.executeQuery();
            while(rs.next()){
                UserDAO userDAO = new UserDAO(rs);
                resultado.add(userDAO);
            }
            if(con != null){
                rs.close();
                stmt.close();
                con.close();
                
            }
        }catch(SQLException e){
            e.printStackTrace();
        }
                
        return resultado;
        
    }
      
    
}