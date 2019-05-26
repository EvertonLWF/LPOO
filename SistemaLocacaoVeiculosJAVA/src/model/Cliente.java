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
    private boolean status;

    public Cliente() {
    }
    public Cliente(ResultSet resultSet) throws SQLException {
        this.cpf = resultSet.getLong("cpf_cli");
        this.nome = resultSet.getString("cpf_nome");
        this.end = resultSet.getString("cpf_end");
        this.tel = resultSet.getString("cpf_tel");
        this.email = resultSet.getString("cpf_email");
        this.status = resultSet.getBoolean("status");
    }

    public Cliente(Long cpf, String nome, String end, String tel, String email, boolean status) {
        this.cpf = cpf;
        this.nome = nome;
        this.end = end;
        this.tel = tel;
        this.email = email;
        this.status = status;
    }

    public Long getCpf() {
        return cpf;
    }

    public void setCpf(Long cpf) {
        this.cpf = cpf;
    }

    public String getNome() {
        return nome;
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

    public boolean getStatus() {
        return status;
    }

    public void setStatus(boolean status) {
        this.status = status;
    }

    @Override
    public String toString() {
        return "Cliente{" + "cpf=" + cpf + ", nome=" + nome + ", end=" + end + ", tel=" + tel + ", email=" + email + ", status=" + status + '}';
    }
}
