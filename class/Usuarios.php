<?php

class Usuarios {

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

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setAdmin($admin) {
        $this->admin = $admin;
    }

    /* Methods */
    public function createUser($nome, $sobrenome, $email, $senha, $admin) {
        $this->nome         = $nome;
        $this->sobrenome    = $sobrenome;
        $this->email        = $email;
        $this->senha        = $senha;
        $this->admin        = 0;
    }
}