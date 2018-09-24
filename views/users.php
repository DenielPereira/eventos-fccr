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
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Gerenciamento de usuários</h1>
            <p class="lead">Aqui estão todos os usuários cadastrados no sistema.</p>
        </div>
    </div>
    <div class="px-5 mt-auto">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Administrador</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td><i class="far fa-check-circle text-success"></i></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td><i class="far fa-times-circle text-danger"></i></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>Silva</td>
                    <td><i class="far fa-times-circle text-danger"></i></td>
                </tr>
                <tr>
                    <th scope="row"><a href="./../views/cadastro.php"><i class="fas fa-plus"></i></a></th>
                    <td class="text-muted">Adicionar Usuário</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<?php include './partials/scripts.php';?>

</html>