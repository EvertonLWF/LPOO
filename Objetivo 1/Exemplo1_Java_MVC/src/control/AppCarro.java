package control;

import model.Carro;

//teste
public class AppCarro extends Object{

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        //instâncias da classe Carro
        Carro objeto1 = new Carro(2019, "Uno", "Fiat");
        System.out.println(objeto1);
        Carro objeto2 = new Carro(2019, "Ka", "Ford");
        System.out.println(objeto2);
        Carro objeto3 = new Carro(2019, "Gol", "Volkswagen");
        System.out.println(objeto3);
        Carro objeto4 = new Carro(2019, "Toro", "Fiat");
        System.out.println(objeto4);
        Carro objeto5 = new Carro(2019, "Bravo", "Fiat");
        System.out.println(objeto5);
    }
    
}
