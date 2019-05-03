package control;

import java.util.Scanner;
import model.Objeto;


/**
 *
 * @author vagner
 */
public class AppObjeto {
    
    public static void main(String[] args) {
        try{   
            //divisão por zero
//            double numerador = 10;
//            double denominador = 0;
//            double divisao = numerador / denominador;
//            System.out.println(divisao); //aqui emite infinity (nas versões anteriores do Java emitia uma exceção)
            
            //lê um valor inválido do teclado
//            Scanner scan = new Scanner(System.in);
//            scan.hasNextInt(20); //testar mundando o valor para 20.00

            //falta do include de outro arquivo
            Objeto obj1 = new Objeto("atributo A", "Atributo B");
            //Objeto obj2 = null;
            System.out.println(obj1.getAtributoA());

        } catch (Exception ex) {
            System.out.println("\nEntrou no catch.");
            System.out.println(ex.getMessage());
            System.out.println(ex.getCause());
            System.out.println(ex.getStackTrace());
        }  finally {
            System.out.println("\n\nSempre executa as intruções que estiverem no finally.");
        }
    }   
}
