<?php 
    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include './partials/head.php';?>
</head>

<body>
    <?php include './partials/navbar.php';?>
    <div class="vh-100">
        <div class="row vh-100">
            <div class="col-lg-6  block border-right">
                <div class="text-center centered ">
                    <h1>Cadastro</h1>
                </div>
            </div>
            <div class="col-lg-6 block">
                <form class="w-50 mx-auto centered" method="POST" action="../src/controllers/login.php">
                    <h4>Cadastro</h4>
                    <div class="row">
                        <div class="col">
                            <div class="form-group text-left mt-3">
                                <label for="nome">Nome</label>
                                <input name="nome" type="text" class="form-control" id="nome" placeholder="Fulano">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group text-left mt-3">
                                <label for="sobrenome">Sobrenome</label>
                                <input name="sobrenome" type="text" class="form-control" id="sobrenome" placeholder="da Silva">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-left">
                        <label for="Email">Email</label>
                        <input name="email" type="email" class="form-control" id="Email" aria-describedby="emailHelp"
                            placeholder="nome.sobrenome@fccr.sp.gov.br">
                    </div>
                    <div class="form-group text-left">
                        <label for="nascimento">Data de Nascimento</label>
                        <input name="senha" type="date" class="form-control" id="nascimento" placeholder="Digite sua senha">
                    </div>
                    <div class="form-group text-left">
                        <label for="Password">Senha</label>
                        <input name="senha" type="password" class="form-control" id="Password" placeholder="Escolha uma senha">
                    </div>
                    <div class="form-group">
                        <div class="form-check  form-check-inline">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                                checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Masculino
                            </label>
                        </div>
                        <div class="form-check  form-check-inline">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Feminino
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check  form-check-inline">
                            <input class="form-check-input" type="checkbox" name="Radios" id="checkbox" value="option1"
                                checked>
                            <label class="form-check-label" for="checkbox">
                                Esse usuário terá privilegios administrativos.
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
    <?php include './partials/scripts.php';?>
</html>