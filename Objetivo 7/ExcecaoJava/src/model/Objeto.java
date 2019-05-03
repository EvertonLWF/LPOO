package model;

/**
 *
 * @author vagner
 */
public class Objeto {
    private String atributoA;
    private String atributoB;

    public Objeto(String atributoA, String atributoB) {
        this.atributoA = atributoA;
        this.atributoB = atributoB;
    }

    public String getAtributoA() {
        return atributoA;
    }

    public void setAtributoA(String atributoA) {
        this.atributoA = atributoA;
    }

    public String getAtributoB() {
        return atributoB;
    }

    public void setAtributoB(String atributoB) {
        this.atributoB = atributoB;
    }

    @Override
    public String toString() {
        return "Objeto{" + "atributoA=" + atributoA + ", atributoB=" + atributoB + '}';
    }
    
}
