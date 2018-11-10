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
            
            ini_set( 'display_errors', true );
            error_reporting( E_ALL );

            if(isset($arquivo)){
                $errors= array();
                $file_name = $imagem->getNome();;
                $file_size = $_FILES['arquivo']['size'];
                $file_tmp = $imagem->getConteudo();
                $file_type = $_FILES['arquivo']['type'];
                $file_ext = strtolower(end(explode('.',$file_name)));  
        
                $usuario = $_SESSION['id'];
        
                $expensions = array("jpeg","jpg","png");

                $path = "../../upload/".$evento."/".$usuario;
        
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
  
                if(in_array($file_ext,$expensions)=== false){
                    $errors[]="Extensão de imagem não permitida, por favor escolha um arquivo JPEG ou PNG.";
                }
        
                if($file_size > 2097152) {
                    $errors[]='File size must be excately 2 MB';
                } 
        
      
                if(empty($errors)==true) {
        
                    $file_name = $file_name.$evento."-".$usuario;
                    $file_path = $path."/".$file_name;
        
                    if(file_exists($file_path)){
                        echo "<script>alert('Uma imagem com este nome já foi cadastrada por você neste evento! Mude o nome da imagem.');</script>";
                        echo "<script>window.location.href = './../../views/checkin.php?id=".$evento."';</script>";
        
                    } else {
                        $upload = move_uploaded_file($file_tmp,"../../upload/".$evento."/".$usuario."/".$file_name);
                        echo "Success";
            
                        if ($upload) {
                            $imagemDAO->insertTable($file_path, $evento, $usuario);
                        }
                    }
            
                } else {
                print_r($errors);
                }
            }

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
