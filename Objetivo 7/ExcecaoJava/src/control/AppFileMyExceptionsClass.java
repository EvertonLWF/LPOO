package control;

/**
 *
 * @author vagner
 */
public class AppFileMyExceptionsClass {
    public static void main(String[] args) {
        try{
            //abrir(""); //sem argumento
            
            abrir("/tmp/teste.txt"); //impossível ler o arquivo
        
        } catch (ParameterException | FileNotFoundException ex) {
            System.out.println("\nEntrou no catch.");
            System.out.println(ex.getCause() + " ### " + ex.getMessage() + " ### " + ex.getClass());
        }finally{
            System.out.println("\nSempre executa o que estiver no finally.");
        }
    }
    
    private static void abrir(String caminho) throws ParameterException, FileNotFoundException{
        
        if(caminho.equals("")){
            throw new ParameterException();
        }
        if(!caminho.equals("")){
            throw new FileNotFoundException();
        }
    
    }//fim método
}

class ParameterException extends Exception{}
class FileNotFoundException extends Exception{} 
