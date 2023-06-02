<?php

    session_start();

    include('app/ui/header.php');


    $action = "";

    if(isset($_GET["action"])) {
        $action = $_GET["action"];
    }

    if($action == "") {
        include 'app/ui/accueil.php';
    }

    if($action == "inscription") {
        include 'app/ui/inscription.php';
    }

    if($action == "professeur"){
        include 'app/ui/professeur.php';
    }

    if($action == "eleve"){
        include 'app/ui/eleve.php';
    }

    if($action == "apropos") {
        include 'app/ui/apropos.php';
    }

    if($action == "logout") {
        include 'app/users/logout.php';
    }

    include('app/ui/footer.php');

?>