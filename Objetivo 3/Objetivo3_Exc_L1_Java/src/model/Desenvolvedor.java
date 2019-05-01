package model;

/**
 *
 * @author vagner
 */
public class Desenvolvedor extends Funcionario{

    @Override
    public double getBonus() {
        return super.getSalario() * 0.05;
    }

    @Override
    public String toString() {
        return "Desenvolvedor{" + super.toString() + "}";
    }
    
    

}
