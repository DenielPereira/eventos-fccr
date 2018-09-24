<?php

include_once("./src/classes/Usuario.php");
include_once("./src/models/UsuarioDAO.php");
include_once("./src/classes/Database.php");

$db = new Database();
$userDAO = new UsuarioDAO($db);
/*

$user = new Usuario();
$user->setNome("Waldrey");
$user->setSobrenome("Souza Silva");
$user->setEmail("waldrey@email.com");
$user->setSenha("waldrey221098");
$user->setAdmin(0);

*/

/* Salvar usúario no banco deados
$userDAO->create($user);
*/

/* Fazer login */
$userDAO->login("deniel.pereira@outlook.it", "1234");
