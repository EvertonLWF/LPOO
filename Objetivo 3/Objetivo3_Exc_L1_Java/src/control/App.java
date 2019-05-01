package control;

import model.Desenvolvedor;
import model.Gerente;

/**
 *
 * @author vagner
 */
public class App {
    
    public static void main(String[] args) {
        /*
        * Por que emite tal erro? Como a classe Funcionario foi marcada como "abstract", não é possível criar instâncias dessa classe, logo, o comando abaixo
        * recebe um erro da IDE "A classe abstrata Funcionario não pode ser instaciada. Retire o comentário para ler essa mensagem da IDE.
        * Como solucionar esse problema? Poderia se pensar em retirar o modificador "abstract" da assinatura da classe. Isso resolveria o problema. 
        * Mas, como não queremos manipular objetos da classe Funcionario, nos protegemos como programador e mantemos o "abstract". Assim ficamos
        * impedidos de acidentalmente manipular objetos que não nos interesssam na aplicação. 
        */
       //$fsuncionario = new Funcionario();

       Desenvolvedor desenvolvedor = new Desenvolvedor();
       desenvolvedor.setNome("Maria Silva");
       desenvolvedor.setSalario(2000.00);
       System.out.println(desenvolvedor);
       System.out.println(desenvolvedor.getBonus());
       Gerente gerente = new Gerente();
       gerente.setNome("Teresa Santos");
       gerente.setSalario(5000.00);
       System.out.println(gerente);
       System.out.println(gerente.getBonus());
    }
}
