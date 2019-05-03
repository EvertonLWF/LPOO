package control;

import java.io.File;

/**
 *
 * @author vagner
 */
public class AppFileJava {
    
    public static void main(String[] args) {
        try{
            abrir(""); //sem argumento
            
            abrir("/tmp/teste.txt"); //impossível ler o arquivo
        
        } catch (Exception ex) {
            System.out.println("\nEntrou no catch.");
            System.out.println(ex.getCause() + " ### " + ex.getMessage() + " ### " + ex.getStackTrace());
        }finally{
            System.out.println("\nSempre executa o que estiver no finally.");
        }
    }
    
    private static void abrir(String caminho) throws Exception{
        
        if(caminho.equals("")){
            throw new Exception();
        }
        if(!caminho.equals("")){
            throw new Exception();
        }
    
    }//fim método


}//fim classe
