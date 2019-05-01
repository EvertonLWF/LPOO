
package control;

import model.Usuario;

/**
 *
 * @author vpsil
 */
public class AppUsuario {
    
    public static void main(String[] args){
        //instâncias da classe Usuario
        Usuario usu1 = new Usuario("a", "a", "a@email.com", "a1");
        System.out.println(usu1);
        Usuario usu2 = new Usuario("b", "b", "b@email.com", "b1");
        System.out.println(usu2);
        Usuario usu3 = new Usuario("c", "c", "c@email.com", "c1");
        System.out.println(usu3);
        Usuario usu4 = new Usuario("d", "d", "d@email.com", "d1");
        System.out.println(usu4);
        Usuario usu5 = new Usuario("e", "e", "e@email.com", "e1");
        System.out.println(usu5);
    }
    
}
