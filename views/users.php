<?php 
    session_start(); 
    if(!$_SESSION['logged'] || !$_SESSION['admin']) header('Location: ./index.php');

    include_once("./../src/controllers/variables.php");
    include_once("./../src/controllers/usuarios.php");
    
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
                <? foreach($users as $rows): ?>
                <tr>
                    <th scope="row"><?php echo $rows[0]; ?></th>
                    <td><?php echo $rows[1]; ?></td></td>
                    <td><?php echo $rows[2]; ?></td>
                    <td>
                        <?php if($rows[3] == 1): ?> 
                            <i class="far fa-check-circle text-success"></i> 
                        <?php else: ?>
                            <i class="far fa-times-circle text-danger"></i>
                        <?php endif; ?>     
                    </td>
                </tr>
                <?php endforeach; ?>
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