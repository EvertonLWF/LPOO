package model;

/**
 *
 * @author vagner
 */
public class Conta {
    private double saldo;

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
    
    public void saca(double valor){
        this.saldo -= valor;
    }
 
    
    public void atualiza(double taxa){
        this.saldo *= (taxa/100);
    }

    @Override
    public String toString() {
        return "Conta{" + "saldo=" + saldo + '}';
    }
        
}
