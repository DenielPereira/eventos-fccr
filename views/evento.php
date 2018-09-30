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
<body style="overflow-y: scroll !important;">
    <?php include './partials/navbar.php';?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Titulo do evento</h1>
            <p class="lead">Aqui estão as informações do evento (titulo)</p>
        </div>
    </div>
     <div class="row">
            <div class="col-lg-6 border-right">
                <div class="text-center mb-3">
                    <img src="https://loremflickr.com/600/400/show,rock" class="rounded mx-auto d-block">                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-2">
                    <h4>Comentários</h4>
                </div>
                <div class="ml-3">
                    <div class="row">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" class="ml-1 rounded-circle" width="50" height="50">
                        <p class="ml-2 mt-3">Adipisicing enim cillum tempor excepteur exercitation magna ad sit eu duis nulla id.</p>
                    </div>
                    <div class="row mt-3 ">
                        <img src="https://www.w3schools.com/howto/img_avatar2.png" class="ml-1 rounded-circle" width="50" height="50">
                        <p class="ml-2 mt-3">Ut deserunt anim id sit mollit.</p>
                    </div>
                    <div class="row mt-3 ">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" class="ml-1 rounded-circle" width="50" height="50">
                        <p class="ml-2 mt-3">Elit aliqua laborum amet et.</p>
                    </div>
                    <div class="row mt-3 ">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" class="ml-1 rounded-circle" width="50" height="50">
                        <p class="ml-2 mt-3">Ipsum aute dolore sint quis.</p>
                    </div>
                    <div class="row mt-3 ">
                        <img src="https://www.w3schools.com/howto/img_avatar2.png" class="ml-1 rounded-circle" width="50" height="50">
                        <p class="ml-2 mt-3">Voluptate ipsum ex anim et cillum consectetur minim dolore nisi aute ea..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>