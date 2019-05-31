/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.sql.ResultSet;
import java.sql.SQLException;

/**
 *
 * @author feijo
 */
public class Cliente {
    private Long cpf;
    private String nome;
    private String end;
    private String tel;
    private String email;
    private boolean situacao;

    public Cliente() {
    }
    public Cliente(ResultSet resultSet) throws SQLException {
        this.cpf = resultSet.getLong("cpf_cli");
        this.nome = resultSet.getString("nome_cli");
        this.end = resultSet.getString("end_cli");
        this.tel = resultSet.getString("tel_cliente");
        this.email = resultSet.getString("email_cli");
        this.situacao = resultSet.getBoolean("situacao");
    }

    public Cliente(Long cpf, String nome, String end, String tel, String email, boolean situacao) {
        this.cpf = cpf;
        this.nome = nome;
        this.end = end;
        this.tel = tel;
        this.email = email;
        this.situacao = situacao;
    }

    public Long getCpf() {
        return this.cpf;
    }

    public void setCpf(Long cpf) {
        this.cpf = cpf;
    }

    public String getNome() {
        return this.nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getEnd() {
        return end;
    }

    public void setEnd(String end) {
        this.end = end;
    }

    public String getTel() {
        return tel;
    }

    public void setTel(String tel) {
        this.tel = tel;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public boolean getSituacao() {
        return situacao;
    }

    public void setSituacao(boolean situacao) {
        this.situacao = situacao;
    }

    @Override
    public String toString() {
        return "Cliente{" + "cpf=" + cpf + ", nome=" + nome + ", end=" + end + ", tel=" + tel + ", email=" + email + ", situacao=" + situacao + '}';
    }
}
