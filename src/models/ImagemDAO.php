<?php

class ImagemDAO {
    
    private $conexaoDB;
    private $lastId;

    public function getLastId(){
        return $this->lastId;
    }
    
    public function __construct($db) {
        $this->_conexaoDB = $db;
    }
    
    
    public function uploadImage($imagem) {
        try {

            $this->lastId = $this->_conexaoDB->lastInsertId();

            $nome         = $imagem->getNome();
            $conteudo     = $imagem->getConteudo();
            $fotos_id     = $imagem->getFotosID();
            $Eventos_id   = $imagem->getEventos_id();
            $Usuario_id   = $imagem->getUsuarioId();
            
            $sql = "INSERT INTO fotos (nome, conteudo)
            VALUES ('$nome', '$conteudo');";

            $sql2= "INSERT INTO fotos_evento (fotos_id, Eventos_id, Usuario_id)
            VALUES ('$fotos_id', '$Eventos_id', '$Usuario_id'); ";

            echo $sql2;
        $this->_conexaoDB->exec($sql);
        $this->_conexaoDB->exec($sql2);

    } catch(PDOException $e) {
        echo "Falha: {$e}";
    }
} 

public function getimagemByEvento($id) {
    try {
        $sql = "SELECT eventos_id, imagem, usuario_id, usuario.nome, usuario.sexo, contador FROM imagem
        JOIN usuario ON imagem.usuario_id = usuario.id WHERE eventos_id = '$id' ORDER BY contador DESC";
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
