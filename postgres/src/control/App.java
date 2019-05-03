package control;


import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import model.Query;
//import model.Conexao;
import model.UserDAO;
/**
 *
 * @author feijo
 */
public class App
{

   
    public static void main(String[] args) throws SQLException
    {
        
        String user   = "postgres";
        String senha = "root";
        String url   = "jdbc:postgresql://localhost:5432/java";
        String q = "SELECT * FROM teste";
        List<UserDAO> usersDAO = new ArrayList<>();
        
        //Conexao conexao = new Conexao(user,senha,url,q);
        Query query = new Query(user,senha,url,q);
        //conexao.connect();
        usersDAO = query.select(q);
        
        System.out.println(usersDAO);
        
        
        
    }
}