<?php 
    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');

    include_once("./../src/controllers/variables.php");
    include_once("./../src/controllers/pegarevento.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include './partials/head.php';?>
</head>
<body class="bg-success">
    <div class="block h-100">
        <div class="card mx-auto" style="width: 40vw; margin-top: 10%">
            <div class="card-body">
                <h5 class="card-title">Você tem certeza disso?</h5>
                <h6 class="card-subtitle mb-2 text-muted">Isso não poderá ser desfeito.</h6>
                <form class="w-80 mx-auto " action="../src/controllers/desativarevento.php" method="POST">
                    <div class="form-group">
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="hidden" name="situacao" value="0" /> <input class="custom-control-input form-check-input" type="checkbox" name="situacao" id="checkbox" value="1" checked>
                            <label class="form-check-label" for="checkbox">
                                    Este evento será <b>EXCLUÍDO</b> e não poderá mais ser visto por ninguém. 
                            </label>
                        </div>
                        <div class="button mt-5">
                            <button type="submit" class=" btn btn-danger">Sim, eu tenho certeza</button>
                        </div>
                    </div>
                </form>
                <button class="btn btn-success" onclick="window.location.href='/views/eventos.php'">Não, eu quero voltar</button>
            </div>
        </div>
    </div>
</body>
</html>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                