<?php 
require '../mailer/PHPMailerAutoload.php';

$url = $_SERVER['REQUEST_URI'];
$parteurl = explode('?', $url);

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
                <h5 class="card-title text-danger">Eita! Algo de errado aconteceu.</h5>
                <h6 class="card-subtitle mb-2 text-muted">O e-mail de recuperação não pôde ser enviado.</h6>
                <h6 class="card-subtitle mb-2 text-muted">Motivo: <? echo $parteurl[1] ?></h6>
                <p>Você precisa da ajuda de um administrador desse sistema. Reporte esse erro ao chefe do seu setor.</p>    
                <button class="btn btn-success" onclick="window.location.href='/views/forgot-pass.php'">Voltar</button>
            </div>
        </div>
    </div>
</body>
</html>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                