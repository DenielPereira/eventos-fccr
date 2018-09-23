<?php

$host = "localhost";
$username = "root";
$pass = "fuH$*!fhigsfiu";
$db = "eventos_fccr";

try {
    $conexao = new PDO("mysql:host=$host;dbname=$db", $username, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<b>EVENTOS FCCR:</b> EVENTOS FCCR: Conexão realizada com sucesso"; 
} catch(PDOException $e) {
    echo "<b>EVENTOS FCCR:</b> Não foi possível realizar conexão <br> Falha: " . $e->getMessage();
}