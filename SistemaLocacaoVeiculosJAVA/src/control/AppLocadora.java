/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import dao.AutomovelDAO;
import dao.ClienteDAO;
import dao.LocacaoDAO;
import java.security.NoSuchAlgorithmException;
import java.sql.SQLException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;

import java.util.List;
import model.Automovel;
import model.Cliente;
import model.Locacao;

/**
 *
 * @author feijo
 */
public class AppLocadora {
    public static void main(String[] args) throws NoSuchAlgorithmException, ParseException, SQLException {
        
        
        LocalDateTime time = LocalDateTime.now();
        DateTimeFormatter formatterData = DateTimeFormatter.ofPattern("dd/MM/uuuu");
        DateTimeFormatter formatterHora = DateTimeFormatter.ofPattern("HH:mm:ss");
        String horaFormatada = formatterHora.format(time);
        String dataFormatadaLocacao = formatterData.format(time);
        String dataFormatadaDevolucao = formatterData.format(time.plusDays(10));
        String data = dataFormatadaLocacao+dataFormatadaDevolucao;
        
        SimpleDateFormat format = new SimpleDateFormat("dd/MM/yyyy");
        SimpleDateFormat format1 = new SimpleDateFormat("HH:mm:ss");
       
        
        
        
        LocacaoDAO locacaoDAO = new LocacaoDAO();
        ClienteDAO clienteDAO = new ClienteDAO();
        AutomovelDAO automovelDAO = new AutomovelDAO();
//        List<Locacao> locacoes = locacaoDAO.findAll();
//        int dias = 10;
//        Double vlLocacao = (auto.get(0).getValorLocacao()) * dias;
//        Double vlCaucao = vlLocacao*0.3;

//        Locacao locacao = new Locacao(clientes.get(0),auto.get(0));
//        locacao.setId_locacao(locacaoDAO.md5(data));
//        locacao.setDtLocacao(new java.sql.Date(format.parse(dataFormatadaLocacao).getTime()));
//        locacao.setDtDevolucao(new java.sql.Date(format.parse(dataFormatadaDevolucao).getTime()));
//        locacao.setHrLocacao(new java.sql.Time(format1.parse(horaFormatada).getTime()));
//        locacao.setHrDevolucao(new java.sql.Time(format1.parse(horaFormatada).getTime()));
//        locacao.setKm(auto.get(0).getKm());
//        locacao.setSituacao(true);
//        locacao.setDevolvido(false);
//        locacao.setVlLocacao(vlLocacao);
//        locacao.setVlCaucao(vlCaucao);

        //locacaoDAO.insert(locacao);
        List<Locacao> locacoes = (locacaoDAO.findAll());
        List<Automovel> automoveis = automovelDAO.findAutomovelByRenavan(locacoes.get(0).getAutomovel().getRenavan());
        List<Cliente> clientes = clienteDAO.findByCpf(locacoes.get(0).getCliente().getCpf());
        Cliente cliente = clientes.get(0);
        cliente.setLocacaoList(locacaoDAO.findByCliente(cliente.getCpf()));
        Automovel automovel = automoveis.get(0);
        Locacao locacao = locacoes.get(0);
        
        locacao.setAutomovel(automovel);
        locacao.setCliente(cliente);

        System.out.println(locacao);
        
    }
}