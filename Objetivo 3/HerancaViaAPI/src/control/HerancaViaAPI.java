package control;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JButton;
import javax.swing.JDialog;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

/**
 *
 * @author vagner
 */
public class HerancaViaAPI extends JFrame{

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        /*
        *    A classe HerancaViaAPI realiza herança simples com a classe da API JFrame.
        *    No trecho abaixo reutilizamos código a partir da herança de comportamentos da classe JFrame.
        *    O resultado é que  podemos construir janelas desktop simplesmente reutilizando código da API de javax.swing.
        */
        HerancaViaAPI janela = new HerancaViaAPI(); //cria um objeto HerancaViaAPI que "é um" tipo de JFrame
        janela.setSize(500, 500); //chama o comportamento da classe JFrame setSize       
        janela.setTitle("Janelas usando JFrame"); //chama o comportamento da classe JFrame setTitle
        janela.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE); //chama o comportamento da classe JFrame setDefaultCloseOperation
        janela.setLocationRelativeTo(null); //chama o comportamento da classe JFrame setLocationRelativeTo
        
        /*
        *    Deste ponto em diante reutiliza código a partir da agregação de código de instâncias de outras classes, como,
        *    JPanel, JButton e ActionEvent.
        *    O resultado é que  podemos adicionar componentes de UI simplesmente reutilizando código da API de javax.swing.
        */
//        JPanel painel = new JPanel(); //agrega um objeto da classe JPanel
//        painel.setSize(200,500); //utiliza o método setSize de JPanel
//        JButton botao = new JButton(); //agrega um objeto da classe JButton
//        botao.setText("Clique aqui"); //utiliza o método setText de JButton
//        botao.addActionListener(new ActionListener() { //utiliza o método addActionListener de JButton para adiconar um objeto que trata eventos
//
//            @Override
//            public void actionPerformed(ActionEvent e) { //utiliza o método actionPerformed da interface ActionListener para tratar o envento
//                JDialog d = new JDialog(janela, "Olá", true);
//                d.setSize(200,200);
//                d.setLocationRelativeTo(janela);
//                JLabel jl = new JLabel("Você clicou no botão.");
//                d.add(jl);
//                d.setVisible(true);
//            }
//        });
//        painel.add(botao);
//        janela.add(painel);
        
        
        /*
        *   Volta a reutilizar um comportamento da herança de JFrame.
        */
        janela.setVisible(true); //chama o comportamento da classe JFrame setVisible
    }
    
}
