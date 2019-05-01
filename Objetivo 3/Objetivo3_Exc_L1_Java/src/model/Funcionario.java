package model;

/**
 *
 * @author vagner
 */
public abstract class Funcionario {
    private String nome;
    private double salario;
    
    public Funcionario() {
        
    }

    public Funcionario(String nome, double salario) {
        this.nome = nome;
        this.salario = salario;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public double getSalario() {
        return salario;
    }

    public void setSalario(double salario) {
        this.salario = salario;
    }
    
    public abstract double getBonus();

    @Override
    public String toString() {
        return "nome=" + nome + ", salario=" + salario;
    }
   
}
