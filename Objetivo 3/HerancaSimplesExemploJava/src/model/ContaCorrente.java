package model;

/**
 *
 * @author vagner
 */
public class ContaCorrente extends Conta{

    @Override
    public void saca(double valor) { //sobreescreve o comportamento da classe Conta
        if(saldo >= valor){ //(getSaldo() >= valor)
            saldo -= valor; //saca(valor);
        }
        
    }
    
}
