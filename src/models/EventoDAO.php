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
}
