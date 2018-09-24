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

            $sql = "INSERT INTO usuario (nome, sobrenome, email, senha, admin)
                VALUES ('$nome', '$sobrenome', '$email', '$senha', '$admin')";
            $this->_conexaoDB->exec($sql);
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }

    public function login($email, $senha) {
        try {
            $sql = "SELECT nome, sobrenome, sexo, nascimento, id, admin FROM usuario
            WHERE email = '$email' AND senha = '$senha'";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows[0]) {
                /* message temporária */
                session_start();
                $_SESSION['nome']   = $rows[0][nome];
                $_SESSION['sobrenome']   = $rows[0][sobrenome];
                $_SESSION['sexo']   = $rows[0][sexo];
                $_SESSION['admin']  = $rows[0][admin];
                $_SESSION['nascimento']  = $rows[0][nascimento];
                $_SESSION['id']     = $rows[0][id];
                $_SESSION['logged'] = true;
                header('Location: ./../../views/home.php');
            } else {
                /* message temporária */
                echo "<script>alert('Dados invalidos')</script>";
            }
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }
}
