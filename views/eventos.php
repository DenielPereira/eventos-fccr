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
<body>
    <?php include './partials/navbar.php';?>
     <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Eventos</h1>
            <p class="lead">Esses são os eventos que estão acontecendo.</p>
        </div>
    </div>
    <div class="px-5 mt-auto">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Local</th>
                    <th scope="col">Criador</th>
                    <th scope="col" class="text-center">Check-in</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><a href="./../views/evento.php">Lorem tempor incididunt aliquip ea labore.</a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Fulano</td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fas fa-check"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Tempor ex labore Lorem minim commodo.</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Fulano</td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fas fa-check"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Qui aute veniam deserunt culpa qui sint nisi ullamco eu.</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Beltrano</td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fas fa-times"></i>
                        </a>
                    </td>
                </tr>

            <? if ($_SESSION['admin'] == 1): ?> 
                    <tr>
                        <th scope="row"><a href="./../views/cadastro-eventos.php"><i class="fas fa-plus"></i></a></th>
                        <td class="text-muted">Adicionar Evento</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
            <? endif; ?>  

            </tbody>
        </table>
    </div>

</body>

</html>