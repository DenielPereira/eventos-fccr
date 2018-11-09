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
            $sql= "INSERT INTO fotos_evento (fotos_id, Eventos_id, Usuario_id)
            VALUES ('$idfoto', '$Eventos_id', '$Usuario_id')";
            $this->_conexaoDB->exec($sql);

        header('Location: ./../../views/checkins.php');

        } catch(PDOException $e) {
        echo "Falha: {$e}";
        }

    } 

    public function getImageByEvento($idEvent) {
        try {
  
            // Selecionando fotos
            $stmt = $this->_conexaoDB->prepare('SELECT conteudo FROM fotos 
            JOIN fotos_evento ON fotos.id=fotos_evento.fotos_id WHERE fotos_evento.Eventos_id = :Eventos_id');
            $stmt->bindParam(':Eventos_id', $idEvent, PDO::PARAM_INT);
            
                // Se executado
                if ($stmt->execute()){

                // Alocando foto
                    $foto = $stmt->fetchObject();
                
                // Se existir
                if ($foto != null){

                    // Definindo tipo do retorno
                    header('Content-Type: image/png');
                    
                    // Retornando conteudo
                    echo $foto->conteudo;
                }
            }

        } catch(PDOException $e) {
             echo "Falha: {$e}";
        }

    }

    public function insertTable($file_path, $eventoID, $usuarioID){
        $sql = "INSERT INTO fotos (nome) VALUES ('$file_path')";
        $resultado = $this->_conexaoDB->exec($sql);

        $this->lastId = $this->_conexaoDB->lastInsertId();
        $ultimoiddeverdade = $this->lastId;

        $sql2 = "INSERT INTO fotos_evento (fotos_id, Eventos_id, Usuario_id) 
        VALUES ('$ultimoiddeverdade', '$eventoID', '$usuarioID')";
        $resultado2 = $this->_conexaoDB->exec($sql2);
    }

    public function selectTable($eventoID){
        $sql = "SELECT nome FROM fotos 
        JOIN fotos_evento ON fotos.id=fotos_evento.fotos_id WHERE fotos_evento.Eventos_id = '$eventoID'";

        $resultado = $this->_conexaoDB->query($sql);
        $rows = $resultado->fetchAll();
            if($rows) {
                return $rows;
            } 
    }

}
