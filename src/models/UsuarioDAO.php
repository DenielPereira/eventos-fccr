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
            echo "Falha: {$e->getMessage()}";
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
                $_SESSION['success']        = false;
                echo "<script>window.location.href = './../../views/index.php';</script>";
            }
        } catch(PDOException $e) {
            echo "Falha: {$e->getMessage()}";
        }
    }

    public function getAllUsers() {
        try {
            $sql = "SELECT id, nome, sobrenome, admin_site, email FROM usuario";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows) {
                return $rows;
            } 
        } catch(PDOException $e) {
            echo "Falha: {$e->getMessage()}";
        }
    }

    public function update($_usuario) {
        try {
            session_start();
            $nome       = $_usuario->getNome();
            $sobrenome  = $_usuario->getSobrenome();
            $email      = $_usuario->getEmail();
            $senha      = $_usuario->getSenha();
            $nascimento = $_usuario->getNascimento();
            $sexo       = $_usuario->getSexo();

            $sql = "UPDATE usuario
                    SET nome = '$nome', sobrenome = '$sobrenome', 
                    email = '$email', senha = '$senha', nascimento = '$nascimento', 
                    sexo = '$sexo' WHERE id = $_SESSION[id]";
            $this->_conexaoDB->exec($sql);
            
            $_SESSION['nome']       = $nome;
            $_SESSION['sobrenome']  = $sobrenome;
            $_SESSION['email']      = $email;
            $_SESSION['senha']      = $senha;
            $_SESSION['nascimento'] = $nascimento;
            $_SESSION['sexo']       = $sexo;
            
            header('Location: ./../../views/home.php');
        } catch(PDOException $e) {
            echo "Falha: {$e->getMessage()}";
        }
    }
    
    public function getUserToAlt($id) {
        try {
            $sql = "SELECT nome, sobrenome, email, senha, nascimento, sexo, admin_site
                    FROM usuario WHERE id = '$id'";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();

            if($rows) {
                return $rows;
            } 

        } catch(PDOException $e) {
                echo "Falha: {$e->getMessage()}";
        }
    }

    public function isUser($email, $nome) {
        try {
            $sql = "SELECT nome, sobrenome, email, senha
                    FROM usuario WHERE email = '$email' AND nome = '$nome'";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();

            if($rows[0]) {
                session_start();
                $_SESSION['nome']           = $rows[0][nome];
                $_SESSION['sobrenome']      = $rows[0][sobrenome];
                $_SESSION['email']          = $rows[0][email];
                $_SESSION['senha']          = $rows[0][senha];
                header('Location: ../../mailer.php'); 
            } else {
                echo "<script>alert ('Ops, a gente não achou ninguem com esses dados, tem certeza que tá tudo certo?');</script>";
                echo "<script>javascript:history.back()</script>";
            }

        } catch(PDOException $e) {
                echo "Falha: {$e->getMessage()}";
        }
    }
            
    public function updateUserAdmin($usuario) {
        try {
            session_start();
            $nome       = $usuario->getNome();
            $sobrenome  = $usuario->getSobrenome();
            $email      = $usuario->getEmail();
            $senha      = $usuario->getSenha();
            $nascimento = $usuario->getNascimento();
            $sexo       = $usuario->getSexo();
            $admin      = $usuario->getAdmin();
            
            $sql = "UPDATE usuario
                    SET nome = '$nome', sobrenome = '$sobrenome', 
                    email = '$email', senha = '$senha', nascimento = '$nascimento', 
                    sexo = '$sexo', admin_site = '$admin' WHERE id = '$_SESSION[idAlt]'";
            $this->_conexaoDB->exec($sql);
                        
            header('Location: ./../../views/users.php');
            } catch(PDOException $e) {
                echo "Falha: {$e->getMessage()}";
                    }
                } 
            }


