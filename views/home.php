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
    <div class="jumbotron jumbotron-fluid welcome">
        <div class="container">

            <h1 class="display-4 mb-4">
                <?php 

                if($_SESSION['sexo'] == 'm' || $_SESSION['sexo'] == 'M'){
                    echo $man;
                }else{
                    echo $woman;
                }
                    echo "<b class="."name".">$name</b> "; 

                ?>
            </h1>
            <!-- TODO: colocar mais mensagens bonitinhas pq sim -->
            <p class="lead">Espero que o seu dia esteja sendo bom :)</p>
        </div>
    </div>
    <hr>
    <!-- Abaixo pretendo colocar alguns relatorios rapidos -->
    <div class="card-deck mt-5 mx-5">
        <div class="card text-center">
            <div class="card-body">
                <p class="card-title text-muted">Voce tem</p>
                <h3 class="card-text color-green">5</h3>
                <p class="card-text">Eventos delegados pra você.</p>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <p class="card-title text-muted">Voce fez</p>
                <h3 class="card-text color-green">6</h3>
                <p class="card-text">Check-ins em eventos.</p>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <p class="card-title text-muted">Voce comentou em</p>
                <h3 class="card-text color-green">4</h3>
                <p class="card-text">Eventos diferentes.</p>
            </div>
        </div>
    </div>
</body>
<?php include './partials/scripts.php';?>

</html>