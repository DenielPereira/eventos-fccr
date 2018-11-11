<?php
session_start();

include_once("./../models/ImagemDAO.php");
include_once("./../classes/Database.php");
include_once("./../classes/Imagem.php");


$db = new Database();
$imagem = new Imagem();
$imagemDAO = new ImagemDAO($db);

$imagem->setNome($_FILES['arquivo']['name']);
$imagem->setConteudo($_FILES['arquivo']['tmp_name']);
$imagem->setArquivo($_FILES['arquivo']);

$imagemDAO->uploadImage($imagem, $imagemDAO, $_GET['id']);
