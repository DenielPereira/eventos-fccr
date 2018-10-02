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
                <div class="ml-0">
                    <? if($comentarios): ?>
                    
                        <?php foreach($comentarios as $comentario): ?>
                            <? if($comentario[sexo] == 'm'): ?>
                                <div class="row mt-3">
                                <div class="col-lg-1">
                                        <img src="../assets/images/avatar_m.png" class="rounded-circle" width="50" height="50">
                                    </div>
                                    <div class="col-lg-11">
                                        <div class="ml-2">
                                            <p class="mb-0 text-success"><? echo $comentario[nome] ?></p>
                                            <p><? echo $comentario[comentario] ?></p>
                                        </div>                                  
                                    </div>
                                </div>
                            <? else: ?>
                                <div class="row">
                                    <div class="col-lg-1">
                                        <img src="../assets/images/avatar_f.png" class="rounded-circle" width="50" height="50">
                                    </div>
                                    <div class="col-lg-11">
                                        <div class="ml-2">
                                            <p class="mb-0 text-success"><? echo $comentario[nome] ?></p>
                                            <p><? echo $comentario[comentario] ?></p>
                                        </div>                                  
                                    </div>
                                </div>
                            <? endif; ?>
                            
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
</body>
</html>