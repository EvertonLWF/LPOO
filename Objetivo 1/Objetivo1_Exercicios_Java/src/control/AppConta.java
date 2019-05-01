package control;

import model.Conta;

/**
 *
 * @author vagner
 */
public class AppConta {
    public static void main(String[] args) {
        Conta conta1 = new Conta();
        System.out.println(conta1);
        conta1.deposita(5000.00);
        System.out.println(conta1);
        
        
        Conta conta2 = new Conta(1000.00);
        System.out.println(conta2);
        conta2.deposita(5000.00);
        System.out.println(conta2);
    }
   
}
