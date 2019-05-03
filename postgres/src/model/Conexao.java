/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author feijo
 */
public class Conexao {
        private String driver = "org.postgresql.Driver";
        private String user;
        private String senha;
        private String url;
        private String query;

    public Conexao(String user, String senha, String url,String query) {
        this.user = user;
        this.senha = senha;
        this.url = url;
        this.query = query;
        
    }
    public Connection connect() throws SQLException{
        Connection con = null;
        try
        {
            Class.forName(driver);
            
            con = (Connection) DriverManager.getConnection(this.url, this.user, this.senha);
            
            System.out.println("Conexão realizada com sucesso.");
             return con;
        }
        catch (ClassNotFoundException ex)
        {
            System.err.print(DriverManager.getDrivers());
        } 
        catch (SQLException e)
        {
            System.err.print(e.getMessage());
        }
        finally{
            
        }
            return con;
            
            
    }
    public String consulta(String Query){
        return "";
    }

    @Override
    public String toString() {
        return "Conexao{" + "driver=" + driver + ", user=" + user + ", senha=" + senha + ", url=" + url + ", query=" + query + '}';
    }
            
}