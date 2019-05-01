package control;

import model.Funcionario;

/**
 *
 * @author vagner
 */
public class AppFuncionario {
    public static void main(String[] args) {
        Funcionario funcionario1 = new Funcionario();
        System.out.println(funcionario1);
        funcionario1.setNome("João dos Santos");
        funcionario1.setSalario(2000.00);
        System.out.println(funcionario1);
        
        
        Funcionario funcionario2 = new Funcionario("Maria Silva", 2600.00);
        System.out.println(funcionario2);
        funcionario2.setSalario(3200.00);
        System.out.println(funcionario2);
    }
}
