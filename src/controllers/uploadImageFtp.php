<?php
session_start();

ini_set( 'display_errors', true );
error_reporting( E_ALL );

$url = $_SERVER['REQUEST_URI'];
$parteurl = explode('?id=/views/checkin.php?id=', $url);

   if(isset($_FILES['arquivo'])){

    $errors= array();
    $file_name = $_FILES['arquivo']['name'];
    $file_size = $_FILES['arquivo']['size'];
    $file_tmp = $_FILES['arquivo']['tmp_name'];
    $file_type = $_FILES['arquivo']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['arquivo']['name'])));  
      
    $evento = $url;
    $usuario = $_SESSION['id'];
      
    $expensions = array("jpeg","jpg","png");
      
    mkdir("../../upload/".$evento."/".$usuario, 0777, true); 

    if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
    } 
      
    if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../../upload/".$evento."/".$usuario."/".$file_name);
         echo "Success";
    }else{
          print_r($errors);
    }

   }

?>