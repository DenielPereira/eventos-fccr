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
            echo "Falha: {$e}";
        }
    }

    public function login($email, $senha) {
        try {
            $sql = "SELECT nome, id, admin_site FROM usuarios
            WHERE email = '$email' AND senha = '$senha'";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows[0]) {
                /* message temporária */
                session_start();
                $_SESSION['nome']   = $rows[0][nome];
                $_SESSION['admin']  = $rows[0][admin_site];
                $_SESSION['id']     = $rows[0][id];
                echo "Bem-vindo, {$_SESSION['nome']}<br>";
                echo "Seu id é: {$_SESSION['id']}";
            } else {
                /* message temporária */
                echo "Dados inválidos";
            }
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }
}