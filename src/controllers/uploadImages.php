<?php
session_start();

include_once("./../models/ImagemDAO.php");
include_once("./../classes/Database.php");
include_once("./../classes/Imagem.php");

$db = new Database();
$imagem = new Imagem();
$imagemDAO = new ImagemDAO($db);

$imagem->setNome($_POST['nome']);
$imagem->setConteudo($_FILES['arquivo[]']);

$imagemDAO->uploadImage($imagem);
