<?php
session_start();

include_once(__DIR__ . "/../models/EventoDAO.php");
include_once(__DIR__ . "/../models/ComentarioDAO.php");
include_once(__DIR__ . "/../classes/Database.php");


$db = new Database();
$eventoDAO = new EventoDAO($db);
$comentarioDAO = new ComentarioDAO($db);

$evento = $eventoDAO->getEvento($_GET['id']);
$registro = $eventoDAO->getParticipante($_SESSION['id'], $_GET['id']);
$comentarios = $comentarioDAO->getComentarioByEvento($_GET['id']);

$_SESSION['idEvento'] = $_GET['id'];
