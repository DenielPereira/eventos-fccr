<?php 
    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');

    include_once("./../src/controllers/variables.php");
    include_once("./../src/controllers/eventos.php");
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
                    <th scope="col">Dia e Horário</th>
                    <th scope="col">Local</th>
                    <th scope="col">Criador</th>
                </tr>
            </thead>
            <tbody>
            <?php if($eventos):?>
                <?php foreach($eventos as $rows): ?>
                <tr>
                    <th scope="row"><?php echo $rows[0]; ?></th>
                    <td><a href="./../views/evento.php?id=<? echo $rows[0]; ?>"><?php echo $rows[1]; ?></a></td></td>
                    <td><?php echo $rows[2]; ?></td>
                    <td>
                        <?php
                            echo $rows[3];
                        ?>
                    </td>
                    <td><?php echo $rows[4]; ?></td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <div class="row d-flex justify-content-center">                      
                        <img src="../assets/images/avatar_f_suport.png" class="rounded-circle" width="50" height="50">                     
                        <div class="ml-2">
                            <p class="mb-0 text-success">Suporte - FCCR</p>
                            <p>Ainda não foram adicionados eventos aqui <i class="far fa-frown" ></i></p>
                        </div>                                  
                    </div>
            <?php endif; ?>   
            <? if($_SESSION['admin'] == 1): ?> 
                <tr>
                    <th scope="row"><a href="./../views/cadastro-eventos.php"><i class="fas fa-plus text-success"></i></a></th>
                    <td class="text-muted">Adicionar Evento</td>
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