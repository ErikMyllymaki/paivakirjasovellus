<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- tyylitiedosto -->
    <style>
    <?php
       include CSS_DIR.'style.css';
    ?>
    </style>

    <title>Päiväkirja</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./">Etusivu</a>
            </li>


            <?php 
                if(isset($_SESSION["username"])){
                    echo '<li class="nav-item">
                    <a class="nav-link" href="diaryentries.php">Päiväkirjamerkinnät</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="keyword.php">Lisää avainsanoja</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="diaryentry.php">Lisää merkintä</a>
                    </li>
                    <li class="nav-item">';
                    echo '<a class="nav-link bg-danger p-2" href="logout.php">Kirjaudu ulos</a>';
                }else{
                    echo '<li class="nav-item">
                    <a class="nav-link" href="user.php">Rekisteröidy</a>
                    </li>';
                    echo '<a class="nav-link bg-success p-2" href="login.php">Kirjaudu sisään</a>';
                }
            ?>
            </li>
        </ul>
        </div>
    </div>
    </nav>