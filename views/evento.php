<?php 
    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');

    include_once("./../src/controllers/variables.php");
    include_once("./../src/controllers/evento.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include './partials/head.php';?>
</head>
<body style="overflow-y: scroll !important;">
    <?php include './partials/navbar.php';?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><? echo $evento[0][titulo] ?></h1>
            <p class="lead">
                <b>Endereço: </b><? echo $evento[0][endereco] ?><br>
                <b>Local: </b><? echo $evento[0][local] ?><br>
                <b>Data e Horário: </b><? echo $evento[0][inicio] ?><br>
            </p>
        </div>
    </div>
     <div class="row">
            <div class="col-lg-6 border-right">
                <div class="text-center mb-3">
                    <img src="https://loremflickr.com/600/400/show,rock" class="rounded mx-auto d-block">                    
                </div>
            </div>
            <div class="col-lg-6">
                <? if($_GET['sucesso']): ?>
                    <div class="alert alert-success text-center" role="alert">
                        Comentário registrado!
                    </div>
                <? endif; ?>
                <div class="mb-2">
                    <h4>Comentários</h4>
                </div>
                <div class="ml-3">
                    <div class="row">
                    <? if($comentarios): ?>
                        <?php foreach($comentarios as $comentario): ?>
                            <? if($comentario[sexo] == 'm'): ?>
                                <img src="https://www.w3schools.com/howto/img_avatar.png" class="ml-1 rounded-circle" width="50" height="50">
                            <? else: ?>
                            <img src="https://www.w3schools.com/howto/img_avatar2.png" class="ml-1 rounded-circle" width="50" height="50">
                            <? endif; ?>
                            <p><? echo $comentario[nome] ?></p>
                            <p class="ml-2 mt-3"><? echo $comentario[comentario] ?></p>
                        <?php endforeach; ?>
                    <? else: ?>
                        <div class="alert alert-danger text-center" role="alert">
                            Não contém nenhum comentário
                        </div>
                    <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>