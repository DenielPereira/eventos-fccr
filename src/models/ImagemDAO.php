<?php

class ImagemDAO {

    private $conexaoDB;

    public function __construct($db) {
        $this->_conexaoDB = $db;
    }


    public function uploadImage($imagem) {
        try {
            $nome       = $imagem->getNome();
            $conteudo   = $imagem->getConteudo();

             if(isset($conteudo)){
                $extensao = strtolower(substr($nome['name'], -4)); //pega a extensao do arquivo
                $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
                $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
                move_uploaded_file($nome['tmp_name'], $diretorio.$novo_nome); //efetua o upload

                $sql = "INSERT INTO fotos (nome, conteudo)
                    VALUES ('$novo_nome', '$conteudo')";

                 if($mysqli->query($sql_code))
                    $msg = "Arquivo enviado com sucesso!";
                    else
                    $msg = "Falha ao enviar arquivo.";
                
            }
            $this->_conexaoDB->exec($sql);
            header('<script>javascript.alert(Sucesso!)</script>');
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
