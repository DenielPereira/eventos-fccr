<?php
session_start();

include_once("./../models/ImagemDAO.php");
include_once("./../classes/Database.php");
include_once("./../classes/Imagem.php");

$db = new Database();
$imagem = new Imagem();
$imagemDAO = new ImagemDAO($db);

$imagem->setNome($_FILES['arquivo']['name']);
$imagem->setConteudo($_FILES['arquivo']);

$imagemDAO->uploadImage($imagem);

ini_set( 'display_errors', true );
error_reporting( E_ALL );

$url = $_SERVER['REQUEST_URI'];
$parteurl = explode('/src/controllers/uploadImageFtp.php?id=/views/checkin.php?id=', $url);

   if(isset($_FILES['arquivo'])){

    $errors = null;
    $file_name = $_FILES['arquivo']['name'];
    $file_size = $_FILES['arquivo']['size'];
    $file_tmp = $_FILES['arquivo']['tmp_name'];
    $file_type = $_FILES['arquivo']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['arquivo']['name'])));  
      
    $expensions = array("jpeg","jpg","png");

      if(in_array($file_ext,$expensions)=== false){

            $errors="Você tem certeza de que isso é uma imagem?";

      }
      
      if($file_size > 2097152) {
            $errors='Parece que seu arquivo tem mais de 2MB!';
      } 
  
    if(empty($errors)==true) {

      $path = "../../upload/";

      if (!file_exists($path)) {
         mkdir($path, 0777, true); 
      }

      move_uploaded_file($file_tmp,$path."/".$file_name);

      echo "<script>alert ('A foto foi adicionada.');</script>";
      echo "<script>javascript:history.back()</script>";

    }else{

      echo "<script>alert ('".$errors."');</script>";
      echo "<script>javascript:history.back()</script>";
      print_r($errors);

    }

}

?>