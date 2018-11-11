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
    
    
    public function uploadImage($imagem, $imagemDAO, $evento) {
        try {
            session_start();
            
            $arquivo = $imagem->getArquivo();
            
            //ini_set( 'display_errors', true );
            //error_reporting( E_ALL );
            
            if(isset($arquivo)){
                
                $errors = null;
                $file_name      = $imagem->getNome();
                $file_size      = $imagem->getTamanho();
                $file_tmp       = $imagem->getConteudo();
                $file_type      = $imagem->getTipo();
                $file_ext       = strtolower(end(explode('.',$file_name)));  
                $file_new_name  = (explode('.',$file_name));         
                
                $usuario = $_SESSION['id'];
                $file_name = $file_new_name[0];
                
                $expensions = array("jpeg","jpg","png");
                
                $path = "../../upload/".$evento."/".$usuario;
                
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                
                if(in_array($file_ext,$expensions)=== false){
                    $errors="Isso não se parece com uma imagem... 
                    Apenas imagens podem ser enviadas.";
                }
                
                if($file_size > 2097152) {
                    $errors="A sua foto é muito grande! <br>
                    Infelizmente arquivos com mais de 2MB não podem ser enviados :( <br> 
                    Tente reduzir o tamanho da foto. <br> ";
                    // Eu posso te indicar <a href="."https://www.easy-resize.com/pt/"." target="."_blank".">esse site</a>, mas você pode fazer do jeito que achar melhor :)";
                    exit;
                } 
                
                
                if(empty($errors)==true) {
                    $file_name = $file_name."(e".$evento."u".$usuario.")".".".$file_ext;
                    $file_path = $path."/".$file_name;
                    if(file_exists($file_path)){
                        echo "<script>alert ('Parece que a gente já tem um arquivo com esse mesmo nome :(  Se você tiver certeza de que não é a mesma foto, tente enviar de novo com um nome diferente.');</script>";
                        echo "<script>javascript:history.back()</script>";
                    }else{
                        $upload = move_uploaded_file($file_tmp,"../../upload/".$evento."/".$usuario."/".$file_name);
                        if ($upload) {
                            $imagemDAO->insertTable($file_path, $evento, $usuario);
                            echo "<script>alert('A imagem foi cadastrada com sucesso!');</script>";
                            echo "<script>javascript:history.back()</script>";
                        }
                    }
                }else{
                    echo "<script>alert ('".$errors."');</script>";
                    echo "<script>javascript:history.back()</script>";
                }
            }
            
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
        
    } 
    
    public function insertTable($file_path, $eventoID, $usuarioID){
        try {     
            $sql = "INSERT INTO fotos (nome) VALUES ('$file_path')";
            $resultado = $this->_conexaoDB->exec($sql);
            
            $this->lastId = $this->_conexaoDB->lastInsertId();
            $fotoID = $this->lastId;
            
            if ($resultado) {
                $sql2 = "INSERT INTO fotos_evento (fotos_id, Eventos_id, Usuario_id) 
                VALUES ('$fotoID', '$eventoID', '$usuarioID')";
                $resultado2 = $this->_conexaoDB->exec($sql2);
            }
            
        } catch(PDOException $e) {
            echo "Falha: {$e->getMessage()}";
        }
    }
    
    public function selectTable($eventoID){
        try {
            $sql = "SELECT nome FROM fotos 
            JOIN fotos_evento ON fotos.id=fotos_evento.fotos_id WHERE fotos_evento.Eventos_id = '$eventoID'";
            
            $resultado = $this->_conexaoDB->query($sql);
            
            $rows = $resultado->fetchAll();
            if($rows) {
                return $rows;
            }
            
        } catch(PDOException $e) {
            echo "Falha: {$e->getMessage()}";
        }  
    }
    
}
