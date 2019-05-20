/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author feijo
 */
class  ConnectDAO {

    public Connection getConnect() throws SQLException {
        Connection conn = null;
    try
        {
            Class.forName("org.postgresql.Driver");
            
            conn = (Connection) DriverManager.getConnection("jdbc:postgresql://localhost:5432/locacaoVeiculos", "postgres", "root");
            System.out.println("ok");
            return conn;
        }
        catch (ClassNotFoundException ex)
        {
            System.err.print(DriverManager.getDrivers());
            System.out.println("Falha na conexao!!!");
            
        } 
        catch (SQLException e)
        {
            System.err.print(e.getMessage());
        }
        return conn;
    }
    public static void main(String[] args) throws SQLException {
        ConnectDAO connectDAO = new ConnectDAO();
        connectDAO.getConnect();
    }
}
