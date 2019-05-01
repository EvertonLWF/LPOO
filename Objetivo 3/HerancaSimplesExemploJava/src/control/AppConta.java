package control;

import model.ContaCorrente;
import model.ContaEmpresarial;
import model.ContaPoupanca;

/**
 *
 * @author Vagner
 */
public class AppConta {
    public static void main(String[] args) {
        /*
         *  Como passamos para abstract a classe Conta, não podemos mais criar instâncias dessa classe.
         *  O compilador irá nos proteger avisando disso.
        */
//        Conta conta1 = new Conta();
//        System.out.println(conta1.getSaldo());
//        conta1.deposita(5000.00);
//        System.out.println(conta1.getSaldo());
//        
//        
//        Conta conta2 = new Conta(1000.00);
//        System.out.println(conta2.getSaldo());
//        conta2.deposita(5000.00);
//        System.out.println(conta2.getSaldo());
        
        /*
        *   A ideia aqui foi demonstrar que podemos reutilizar código a partir da associação entre classes. Nesse caso, utilizamos a
        *   associação conhecida como herança (observe que as classes ContaCorrente e ContaPoupança quase não tem código, ele é reutilizado).
        *   Através da cláusula extends na assinatura das classes ContaCorrente e ContaPoupança fizemos tal associação.
        *   Observe a classe ContaCorrente, nela nós estamos sobreescrevendo o comportamento saca(double) da classe Conta. Isso é muito comum,
        *   geralmente utilizamos a associação por herança para reescrever os nossos próprios comportamentos (sobreescrever comportamentos) e,
        *   também, reutilizar código que já está escrito na superclasse.
        */
        
        ContaPoupanca cp = new ContaPoupanca(); //cria um objeto da classe ContaPoupanca
        cp.deposita(500.00); //chama um comportamento definido na classe Conta
        System.out.println("Saldo após a abertura da conta poupança = " + cp.getSaldo()); //chama um comportamento definido na classe Conta 
        
        ContaCorrente cc = new ContaCorrente(); //cria um objeto da classe ContaPoupanca
        cc.deposita(100.00); //chama um comportamento definido na classe Conta
        System.out.println("Saldo após a abertura da conta corrente = " + cc.getSaldo()); //chama um comportamento definido na classe Conta
        cc.saca(50.00); //chama um comportamento redefinido (sobreescrito) na classe ContaCorrente.
        System.out.println("Saldo após o saque da conta corrente = " + cc.getSaldo()); //chama um comportamento definido na classe Conta
    
        
        /*
            Adicionamos mais uma funcionalidade a aplicação. Agora ele pode realizar transações numa conta empresarial. Para isso,
            bastou adiconar uma classe na hierarquia de classes e reprogramar o comportamente para saques (nesse exemplo).
            Observe como é fácil escalonar uma aplcação utilizando o paradigma OO.
        */
        ContaEmpresarial ce = new ContaEmpresarial();
        ce.deposita(100000.00);
        System.out.println("Saldo após depósito na conta empresarial = " + ce.getSaldo());
        ce.saca(125000.00);
        System.out.println("Saldo após saque na conta empresarial = " + ce.getSaldo());
        System.out.println("Limite após saque = " + ce.getLimite());
    }
   
}
