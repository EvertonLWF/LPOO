package model;

/**
 *
 * @author vagner
 */
public class ContaEmpresarial extends Conta{
    
    private double limite = 30000.00;

    public double getLimite() {
        return limite;
    }

    public void setLimite(double limite) {
        this.limite = limite;
    }
    
    @Override
    public void saca(double valor) { //sobreescreve o comportamento da classe Conta
        if((saldo) >= valor){
            saldo -= valor;
        }else if((saldo + limite) >= valor){
            saldo -= valor;
            limite += saldo;
        }
    }
}
