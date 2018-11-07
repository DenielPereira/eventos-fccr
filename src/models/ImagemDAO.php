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

            define('TAMANHO_MAXIMO', (2 * 1024 * 1024));

            $nome         = $imagem->getNome();
            $conteudo     = $imagem->getConteudo();
            $Eventos_id   = $imagem->getEventos_id();
            $Usuario_id   = $imagem->getUsuarioId();

            $tipo = $conteudo['type'];
            $tamanho = $conteudo['size'];

                if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/', $tipo))
                {
                    echo ('Isso não é uma imagem válida');
                    exit;
                }
                
                // Tamanho
                if ($tamanho > TAMANHO_MAXIMO)
                {
                    echo ('A imagem deve possuir no máximo 2 MB');
                    exit;
                }
                
                // Transformando foto em dados (binário)
                $image = file_get_contents($conteudo['tmp_name']);

            // Usando método prepare do PDO
            $stmt = $this->_conexaoDB->prepare('INSERT INTO fotos (nome, conteudo) VALUES (:nome, :conteudo)');
 
            // Definindo parâmetros
            $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindValue(':conteudo', $image, PDO::PARAM_LOB);
            $stmt->execute();

            // Pegando o ID do último INSERT na tabela Fotos
            $this->lastId = $this->_conexaoDB->lastInsertId();
            $idfoto = $this->lastId;

            // Fazendo INSERT na tabela Fotos_evento
            $sql2= "INSERT INTO fotos_evento (fotos_id, Eventos_id, Usuario_id)
            VALUES ('$idfoto', '$Eventos_id', '$Usuario_id')";
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
