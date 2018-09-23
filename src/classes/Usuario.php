<?php

class Usuario {

    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $admin;

    /* Getters */
    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getAdmin() {
        return $this->admin;
    }

    /* Setters */
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setAdmin($admin) {
        $this->admin = $admin;
    }

    /* Methods */

}