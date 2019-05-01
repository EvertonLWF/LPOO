package model;

/**
 *
 * @author vagner
 */
public class Gerente extends Funcionario{

    @Override
    public double getBonus() {
        return super.getSalario() * 0.20;
    }

    @Override
    public String toString() {
        return "Gerente{" + super.toString() + "}";
    }
    
}
