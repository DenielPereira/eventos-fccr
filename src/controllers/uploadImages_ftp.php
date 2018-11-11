<?php
include_once("./../models/ImagemDAO.php");
include_once("./../classes/Database.php");
include_once("./../classes/Imagem.php");

$db = new Database();
$imagem = new Imagem();
$imagemDAO = new ImagemDAO($db);

session_start();

//ini_set( 'display_errors', true );
//error_reporting( E_ALL );


if(isset($_FILES['arquivo'])){

    $errors = null;
    $file_name = $_FILES['arquivo']['name'];
    $file_size = $_FILES['arquivo']['size'];
    $file_tmp = $_FILES['arquivo']['tmp_name'];
    $file_type = $_FILES['arquivo']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['arquivo']['name'])));  
    $file_new_name = (explode('.',$_FILES['arquivo']['name']));         
    
    $evento = $_GET['id'];
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
            move_uploaded_file($file_tmp,"../../upload/".$evento."/".$usuario."/".$file_name);
            $imagemDAO->insertTable($file_path, $evento, $usuario);
            echo "<script>javascript:history.back()</script>";
        }
    }else{
        echo "<script>alert ('".$errors."');</script>";
        echo "<script>javascript:history.back()</script>";
    }
}
