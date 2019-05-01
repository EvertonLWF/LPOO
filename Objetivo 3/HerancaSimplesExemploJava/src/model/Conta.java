package model;

/**
 *
 * @author vagner
 */
public abstract class Conta { //a cláusula abstract impede a criação de instâncias desse classe
    protected double saldo;

    public Conta(){}
    
    public Conta(double valor) {
        this.saldo = valor;
    }
     
    public double getSaldo(){
        return this.saldo;
    }
    
    public void deposita(double valor){
        this.saldo += valor;
     }
    
    public void saca(double valor){ //esse comportamento foi sobrescrito (redefinido) na classe ContaCorrente.
        this.saldo -= valor;
    }
 
    
    public void atualiza(double taxa){
        this.saldo *= (taxa/100);
    }
        
}
