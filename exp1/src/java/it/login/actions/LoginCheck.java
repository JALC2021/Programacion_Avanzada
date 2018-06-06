/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package it.login.actions;

import com.opensymphony.xwork2.ActionSupport;

/**
 *
 * @author jalc
 */
public class LoginCheck extends ActionSupport {

    private String username;
    private String password;

    public LoginCheck(String username, String password) {
        this.username = username;
        this.password = password;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    @Override
    public String execute() throws Exception {
        if (this.getUsername().equals(this.getPassword())) {
            return SUCCESS;
        } else {
            return ERROR;
        }
    }

}
