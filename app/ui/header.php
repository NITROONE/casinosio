<?php
    include('app/sys/connexion.php');

?>

<!DOCTYPE html>
<html class="index" lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TP accès aux données</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Stahcasino</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="assets/reset.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <!-- Section Header -->

    <?php
        if(isset($_SESSION["user"])) {
            echo "<div class='header-container'>";
        }
        else {
            echo "<div class='header-container big'>";
        }
    ?>
    
        <nav>
            <?php

            ### on ajuste le texte si un utilisateur est connecte ou non
                    if(isset($_SESSION["user"])) {
                        $fullnameheader = $_SESSION['fullname'];
                        echo "<p>$system_siteTitle • Bienvenue $fullnameheader</p>";
                    }
                    else {
                        echo "<p><a href='?action='> $system_siteTitle </a></p>";
                    }
            ?>

            <ul>
                <?php
                ### on ajuste les fonctions si un utilisateur est connecte ou non
                    if(isset($_SESSION["user"])) {
                        echo "<li><a href='?action=logout'>Déconnexion</a></li>";
                    }
                    else {
                        echo "<li><a href='?action=inscription'>Inscription</a></li>";
                    }
                ?>

                <li>
                    <a href="?action=apropos">A propos</a>
                </li>
            </ul>
        </nav>
        <header>
            <?php
                if(!isset($_SESSION["user"])) {
                    echo "<h4>Le Entcasino</h4><p>$system_landingDesc</p>";
                }
            ?>
        </header>

    </div>
