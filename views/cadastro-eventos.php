<?php 
    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');
    
    include_once("./../src/controllers/variables.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include './partials/head.php';?>
</head>

<body style="overflow-y: scroll !important;">
    <?php include './partials/navbar.php';?>
    <div class="vh-100">
        <div class="row vh-100">
            <div class="col-lg-6 block border-right">
                <div class="text-center centered ">
                    <h1>Novo Evento</h1>
                </div>
            </div>
            <div class="col-lg-6 block">
                <form class="w-80 mx-auto centered" method="POST" action="../src/controllers/login.php">
                    <h4>Cadastro de eventos</h4>
                    <div class="form-group text-left mt-3">
                        <label for="titulo">Titulo</label>
                        <input name="titulo" type="text" class="form-control" id="titulo" aria-describedby="tituloHelp"
                            placeholder="Titulo do evento">
                    </div>
                    <div class="form-group text-left">
                        <label for="local">Local</label>
                        <input name="local" type="text" class="form-control" id="local" placeholder="Onde vai acontecer?">
                    </div>
                    <div class="form-group text-left">
                        <label for="endereco">Endereço</label>
                        <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Onde fica o local do evento?">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group text-left">
                                <label for="inicio">Hora de inicio</label>
                                <input name="inicio" type="datetime-local" class="form-control" id="inicio">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group text-left">
                                <label for="fim">Hora de fim</label>
                                <input name="fim" type="datetime-local" class="form-control" id="fim">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Criar Evento</button>
                </form>
            </div>
        </div>
    </div>
</body>
    <?php include './partials/scripts.php';?>
</html>