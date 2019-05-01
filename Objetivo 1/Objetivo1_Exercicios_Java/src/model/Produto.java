package model;

/**
 *
 * @author vagner
 */
public class Produto {
    private String nome;
    private String descricacao;
    private double valor;
    private int quantidade;

    public Produto() {
    }

    public Produto(String nome, String descricacao, double valor, int quantidade) {
        this.nome = nome;
        this.descricacao = descricacao;
        this.valor = valor;
        this.quantidade = quantidade;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getDescricacao() {
        return descricacao;
    }

    public void setDescricacao(String descricacao) {
        this.descricacao = descricacao;
    }

    public double getValor() {
        return valor;
    }

    public void setValor(double valor) {
        this.valor = valor;
    }

    public int getQuantidade() {
        return quantidade;
    }

    public void setQuantidade(int quantidade) {
        this.quantidade = quantidade;
    }

    @Override
    public String toString() {
        return "Produto{" + "nome=" + nome + ", descricacao=" + descricacao + ", valor=" + valor + ", quantidade=" + quantidade + '}';
    }
    
}
