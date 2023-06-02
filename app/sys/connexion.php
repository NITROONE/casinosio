<?php

    //connexion Ã  la base de donnÃ©es
    //$user = 'btssio17_evaluationsio'; // nom d'utilisateur pour se connecter
    //$pass = 'Sio1#2023'; // mot de passe de l'utilisateur pour se connecter
    $user = 'root'; // nom d'utilisateur pour se connecter
    $pass = ''; // mot de passe de l'utilisateur pour se connecter
    //Pour que les donnÃ©es arrivent dans le programme encodÃ©es en UTF8, il faut fournir des paramÃ¨tres
    $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES 'UTF8'";
    $connexion = new PDO('mysql:host=localhost;dbname=casino', $user, $pass, $pdo_options);

    //ParamÃ©trer la connexion pour rÃ©cupÃ©rer les erreurs de la base de donnÃ©es
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // on initialise les parametres du site

    $tableSettings = $connexion->query("SELECT * FROM parametres")->fetch();

    $system_siteTitle   = $tableSettings['nom_site'];
    $system_siteMeta    = $tableSettings['meta_data'];
    $system_siteVersion = $tableSettings['version'];

    // reglages temporaires le temps de les relier a la base de donnees. donnees liees au site

    $system_siteTitle   = "ENTcasino";
    $system_landingDesc = "Bienvenue sur le site $system_siteTitle.<br>Auto-formez vous et consultez vos résultats en ligne.";


?>