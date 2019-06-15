/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import dao.MarcaDAO;
import java.math.BigInteger;
import static java.nio.charset.StandardCharsets.UTF_8;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.sql.Date;
import java.sql.SQLException;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.GregorianCalendar;
import java.util.List;
import model.Marca;
import model.Modelo;

/**
 *
 * @author feijo
 */
public class AppMarca {
     private static String md5(String data)
            throws NoSuchAlgorithmException {
        // Get the algorithm:
        MessageDigest md5 = MessageDigest.getInstance("MD5");
        // Calculate Message Digest as bytes:
        byte[] digest = md5.digest(data.getBytes(UTF_8));
        // Convert to 32-char long String:
        return String.format("%032x%n", new BigInteger(1, digest));
    
    }
        
    public static void main(String[] args) throws SQLException, NoSuchAlgorithmException {
        Marca marca = new Marca();
        MarcaDAO marcaDAO = new MarcaDAO();
        List<Marca> marcas = new ArrayList<>();
        List<Modelo> modelos = new ArrayList<>();
        modelos = marcaDAO.findAllModelos("ford");
        marcas = marcaDAO.findByMarca("ford");
        marca.setDescricao(marcas.get(0).getDescricao());
        marca.setSituacao(marcas.get(0).getSituacao());
        marca.setModelosList(modelos);
          
        
        LocalDateTime agora = LocalDateTime.now();
        
        DateTimeFormatter formatterData = DateTimeFormatter.ofPattern("dd/MM/uuuu");
        String dataFormatada = formatterData.format(agora.plusDays(10));

        // formatar a hora
        DateTimeFormatter formatterHora = DateTimeFormatter.ofPattern("HH:mm:ss");
        String horaFormatada = formatterHora.format(agora);
        System.out.println(agora);
        System.out.println(dataFormatada);
        System.out.println(horaFormatada);

        String data = dataFormatada+horaFormatada;
        System.out.printf("MD5 of '%s': %s%n", data, md5(data));
    }
}
