package control;

import model.Produto;

/**
 *
 * @author vagner
 */
public class AppProduto {
    public static void main(String[] args) {
        Produto produto1 = new Produto();
        System.out.println(produto1);
        produto1.setNome("Arroz");
        produto1.setDescricacao("Arroz polido tipo 1");
        produto1.setValor(9.80);
        produto1.setQuantidade(200);
        System.out.println(produto1);
        
        
        Produto produto2 = new Produto("Feijão", "Feijão preto tipo 1", 7.20, 500);
        System.out.println(produto2);
        produto2.setValor(10.50);
        System.out.println(produto2);
    }
}
