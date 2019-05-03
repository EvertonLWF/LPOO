package control;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author vagner
 */
public class AppJDBC {
    
    /*
        O construtor implanta o driver no servidor de banco de dados com o Class.forName.
    */
//    public AppJDBC() {
//        try {
//            //Class.forName("com.mysql.jdbc.Driver"); //para servidor MySql
//            Class.forName("org.mariadb.jdbc.Driver"); //para servidor MariaDB
//        } catch (ClassNotFoundException ex) {
//            System.out.println("\nEntrou no catch.");
//            System.out.println(ex.getCause() + " ### " + ex.getMessage() + " ### " + " ### " + ex.getClass());
//        }
//    }
	
    /*
        Obtém o objeto de acesso ao banco de dados.
     */
    protected Connection getConnection(){
        //URL de conexão com o banco de dados.
        String url = "jdbc:mysql://localhost:3306/vendas";

        try {
            return DriverManager.getConnection(url,"root", "");
        } catch (SQLException ex) {
            System.out.println("");System.out.println("\nEntrou no catch.");
            System.out.println(ex.getCause() + " ### " + ex.getMessage() + " ### " + " ### " + ex.getClass());
            return null;
        }
    }

    public static void main(String[] args) {
        AppJDBC db = new AppJDBC();
        //testa a conexão
        Connection conn = db.getConnection();
        System.out.println(conn);
    }
}
