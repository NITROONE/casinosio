<?php

if(isset($_SESSION["user"])) {
    $disppage = 1;   
    $message = "Bienvenue " . $_SESSION["fullname"] . ", vous êtes maintenant connecté au service.<br>Le reste arrive bientôt.";
}
else {
    $disppage = 0;
    $message = "";
}


// si une requete est envoyee on la traite

if(isset($_POST['email']) && isset($_POST['pwd'])){
    $email = htmlentities($_POST['email']);
    $pswd = hash("sha512", $_POST['pwd']);

    // check si les valeurs sont convenables
    if(strlen($email) < 50 && strlen($_POST['pswd']) < 30) {


        // check si l'user email ainsi que son password existe
        $req = $connexion->prepare("SELECT * FROM users WHERE user_email=? AND user_pwd=?");
        $req->execute([$email,$pswd]); 
        $userlogin = $req->fetch();
        $name = $userlogin['nom_public'];
        $userid = $userlogin['id'];
        $role = $userlogin['role'];

        if ($userlogin) {
            // les logins sont bons

            $_SESSION["user"] = $userid;
            $_SESSION["fullname"] = $name;
            if ($role == 1){
                header('Location:indexx.html?action=professeur');
            }
            else{
                header('Location:indexx.html?action=eleve');
            }
            exit;
        } else {
            $message = "Veuillez vérifier vos informations de connexion.";
        }
    }
    else {
        $message = "Les informations que vous avez entrées sont trop longues. (max 50 caractères).";
    }
}

// sinon on affiche le form

else {
    $email = '';
    $pswd = '';
}

?>

<div class="body-content" id="landing">
    <div class="login-page">

        <?php
            if($disppage == 0) {
                echo "<div class='form-inline'>";
            }
            else {
                echo $message;
                echo "<div class='form-inline invisible'>";
            }
        ?>

            <h4>Connectez-vous</h4>
            <?php echo "<b>$message</b><br>"; ?>
            
            <form action="indexx.html?action=" method="post">
                <div class="form-input">
                    <input type="email" placeholder="E-mail" name="email" id="email" required>
                </div>
                <div class="form-input">
                    <input type="password" placeholder="Mot de passe" name="pswd" id="pswd" required>
                </div>
                <div class="form-input">
                    <button type="submit"><span class="material-icons">send</span></button>
                </div>
            </form>
        </div>

        <?php
            if($disppage == 0) {
                echo "<h5><a href='?action=inscription'>Ou inscrivez-vous</a></h5>";
            }
        ?>
        
    </div>

</div>