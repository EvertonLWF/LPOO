package control;

import model.Carro;

/**
 *
 * @author vagner
 */
public class AppCarro {
    public static void main(String[] args) {
        Carro carro1 = new Carro();
        System.out.println(carro1);
        carro1.setMarca("VolksVagem");
        carro1.setModelo("Fox");
        carro1.setAnoFabricacao(2012);
        System.out.println(carro1);
        
        
        Carro carro2 = new Carro("Fiat", "Uno", 2000);
        System.out.println(carro2);
        carro2.setAnoFabricacao(2015);
        System.out.println(carro2);
    }
}
