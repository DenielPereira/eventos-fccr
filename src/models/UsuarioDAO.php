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
            $nascimento = $_usuario->getNascimento();
            $sexo       = $_usuario->getSexo();
            $admin      = $_usuario->getAdmin();

            $sql = "INSERT INTO usuario (nome, sobrenome, email, senha, nascimento, sexo, admin_site)
                VALUES ('$nome', '$sobrenome', '$email', '$senha', '$nascimento', '$sexo','$admin')";
            $this->_conexaoDB->exec($sql);
            header('Location: ./../../views/users.php');
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }

    public function login($email, $senha) {
        try {
            $sql = "SELECT nome, sobrenome, email, sexo, nascimento, id, admin_site FROM usuario
            WHERE email = '$email' AND senha = '$senha'";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows[0]) {
                session_start();
                $_SESSION['nome']           = $rows[0][nome];
                $_SESSION['sobrenome']      = $rows[0][sobrenome];
                $_SESSION['sexo']           = $rows[0][sexo];
                $_SESSION['email']          = $rows[0][email];
                $_SESSION['admin']          = $rows[0][admin_site];
                $_SESSION['nascimento']     = $rows[0][nascimento];
                $_SESSION['id']             = $rows[0][id];
                $_SESSION['logged']         = true;
                header('Location: ./../../views/home.php'); 
            } else {
                /* message temporária */
                echo "Dados inválidos";
            }
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }

    public function getAllUsers() {
        try {
            $sql = "SELECT id, nome, sobrenome, admin_site FROM usuario";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows) {
                return $rows;
            } 
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }
}
