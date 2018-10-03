<?php

class EventoDAO {

    private $conexaoDB;

    public function __construct($db) {
        $this->_conexaoDB = $db;
    }
    
    public function create($_evento) {
        try {
            $titulo     = $_evento->getTitulo();
            $local      = $_evento->getLocal();
            $endereco   = $_evento->getEndereco();
            $inicio     = $_evento->getInicio();
            $fim        = $_evento->getFim();
            $criador    = $_evento->getCriador();

            $sql = "INSERT INTO eventos (titulo, local, endereco, inicio, fim, criador)
                VALUES ('$titulo', '$local', '$endereco', '$inicio', '$fim', '$criador')";
            
            $this->_conexaoDB->exec($sql);
            header('Location: ./../../views/eventos.php');
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    } 

    public function getEvento($id) {
        try {
            $sql = "SELECT titulo, endereco, local, DATE_FORMAT(inicio, '%d/%m/%Y - %H:%i'), fim FROM eventos WHERE id = '$id'";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows) {
                return $rows;
            } 
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }

    public function getAllEvents() {
        try {
            $sql = "SELECT eventos.id, eventos.titulo, DATE_FORMAT(eventos.inicio, '%d/%m/%Y - %H:%i'), eventos.local, usuario.nome FROM eventos
            jOIN usuario ON eventos.criador = usuario.id;";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows) {
                return $rows;
            } 
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }

    public function getChecksInFull($id) {
        try {
            $sql = "SELECT eventos.id, eventos.titulo, eventos.inicio, eventos.local, usuario.nome FROM eventos
            JOIN usuario ON eventos.criador = usuario.id
            JOIN participantes WHERE participantes.Usuario_id = '$id' AND eventos.id = participantes.Eventos_id";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows) {
                return $rows;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }

    public function Checkin($id){
        $idUsuario = $id;

        try{
            $sql = "INSERT INTO participantes (eventos_id, usuario_id) VALUES ('$eventoID', '$idUsuario')";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();

            if($rows) {
                return $rows;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }


    }

}
