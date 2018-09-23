<?php

include_once("./../models/UsuarioDAO.php");
include_once("./../classes/Database.php");

$db = new Database();
$userDAO = new UsuarioDAO($db);

$userDAO->login($_POST['email'], $_POST['senha']);

?>