<?php

class UsuarioDAO {

    private $conexaoDB;

    public function __construct($db) {
        $this->_conexaoDB = $db;
    }

    public function create($_usuario) {
        try {
            $nome       = $_usuario->getNome();
            $sobrenome  = $_usuario->getSobrenome();
            $email      = $_usuario->getEmail();
            $senha      = $_usuario->getSenha();
            $admin      = $_usuario->getAdmin();

            $sql = "INSERT INTO usuarios (nome, sobrenome, email, senha, admin_site)
                VALUES ('$nome', '$sobrenome', '$email', '$senha', '$admin')";
            $this->_conexaoDB->exec($sql);
        } catch(PDOException $e) {
        }
    }
}