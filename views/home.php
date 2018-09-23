<!DOCTYPE html>
<html>

<head>
    <?php include './partials/head.html';?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="http://fccr.sp.gov.br" target="_blank">
           <img src="../img/fccr_horizontal_white.png" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav mr-auto justify-content-center">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Check-ins</a>
                </li>
            </ul>
            <div class="profile form-inline">
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        José da Silva
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <h6 class="dropdown-header">Perfil</h6>
                        <a class="dropdown-item" href="#">Meus Eventos</a>
                        <a class="dropdown-item" href="#">Configurações</a>
                        <a class="dropdown-item" href="#">Sair</a>
                    </div>
                </div>
                <img src="https://www.w3schools.com/howto/img_avatar.png" class="ml-1">
            </div>
        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Olá Fulano!</h1>
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
                <h5 class="card-title">Dar check-out</h5>
                <p class="card-text">
                    Ops, errei. E agora? <br> 
                    Não tem problema. É só dar check-out clicando no evento que você clicou por engano.
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</body>
<?php include './partials/scripts.html';?>

</html>