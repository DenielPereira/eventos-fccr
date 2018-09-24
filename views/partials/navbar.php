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
                    <?php echo $_SESSION['nome'] . " " . $_SESSION['sobrenome'];?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <h6 class="dropdown-header">Perfil</h6>
                    <a class="dropdown-item" href="#">Meus Eventos</a>
                    <a class="dropdown-item" href="#">Configurações</a>
                    <a class="dropdown-item" href="./../src/controllers/logout.php">Sair</a>
                </div>
            </div>
            <img src="https://www.w3schools.com/howto/img_avatar.png" class="ml-1">
        </div>
    </div>
</nav>