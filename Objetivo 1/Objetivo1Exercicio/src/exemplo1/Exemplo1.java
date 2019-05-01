package exemplo1;

//Criação de classe Carro 







class Carro{
    //atributos
    public int ano;
    public String modelo;
    public String marca;
    
    //construtor de objetos
    public Carro(){}
    
    public Carro(int ano, String modelo, String marca) {
        this.ano = ano;
        this.modelo = modelo;
        this.marca = marca;
    }

    @Override
    public String toString() {
        return "Carro{" + "ano=" + ano + ", modelo=" + modelo + ", marca=" + marca + '}';
    }
      
}//fim classe

class Usuario{

    public String nome;
    public String sobrenome;
    public String email;
    public String senha;
    
    public Usuario(String nome, String sobrenome, String email, String senha) {
        this.nome = nome;
        this.sobrenome = sobrenome;
        this.email = email;
        this.senha = senha;
    }

    @Override
    public String toString() {
        return "Usuario{" + "nome=" + nome + ", sobrenome=" + sobrenome + ", email=" + email + ", senha=" + senha + '}';
    }
    
}//fim classe


public class Exemplo1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        //instanciou objetos da classe Carro
        Carro objeto1 = new Carro(2019, "Uno", "Fiat");
        System.out.println(objeto1);
        Carro objeto2 = new Carro(2018, "Uno", "Fiat");
        System.out.println(objeto2);
        Carro objeto3 = new Carro(2017, "Uno", "Fiat");
        System.out.println(objeto3);
        Carro objeto4 = new Carro(2016, "Uno", "Fiat");
        System.out.println(objeto4);
        Carro objeto5 = new Carro(2015, "Uno", "Fiat");
        System.out.println(objeto5);

        //instanciou objetos da classe Usuario
        Usuario objeto6 = new Usuario("João", "de Deus", "email_joao@dominio.com", "senha5");
        System.out.println(objeto6);
        Usuario objeto7 = new Usuario("Maria", "da Cruz", "email_maria@dominio.com", "senha11");
        System.out.println(objeto7);
    }//fim main
    
}//fim classe
