<?php 
    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');

    include_once("./../src/controllers/variables.php");
?>
<!DOCTYPE html>
<html>

<head>
    <?php include './partials/head.php';?>
</head>

<body>
    <?php include './partials/navbar.php';?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">
                <?php 

                if($_SESSION['sexo'] == 'm'){
                    echo $man;
                }else{
                    echo $woman;
                }
                    echo $name; 

                ?>.
            </h1>
            <p class="lead">Essa é a sua home page, e abaixo estão as ações que você pode realizar.</p>
        </div>
    </div>
    <div class="card-deck mt-5 mx-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Participar de eventos</h5>
                <p class="card-text">Quando os eventos forem sendo criados, você poderá escolher os eventos que você
                    está participando, clicando neles na lista de eventos!</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Dar check-in</h5>
                <p class="card-text">Você pode dar check-in nos eventos quando eles começarem.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Comentar</h5>
                <p class="card-text">
                    Colabore com os outros produtores escrevendo suas observações sobre o evento. Assim eles vão saber
                    como melhorar no futuro. Você pode até colocar fotos!
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</body>
<?php include './partials/scripts.php';?>

</html>