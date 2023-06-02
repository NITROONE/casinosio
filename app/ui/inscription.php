<?php

$message = "";
$disppage= 0;

// si l'utilisateur est deja connecte, on le renvoi a l'accueil
if(isset($_SESSION["user"])) {
    header('Location:index.php');
    exit;
}

// si une requete est envoyee on la traite

if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['pwd'])){


    $email = htmlentities($_POST['email']);
    $name = htmlentities($_POST['name']);
    $pwd = hash("sha512", $_POST['pwd']);


    // check si les valeurs sont convenables
    if(strlen($name) > 1 && strlen($name) < 30 && strlen($_POST['pwd']) > 1 && strlen($_POST['pwd']) < 30) {


        // check si l'email est deja prise
        $emailreq = $connexion->prepare("SELECT * FROM users WHERE user_email=?");
        $emailreq->execute([$email]);
        $usermail = $emailreq->fetch();

        if ($usermail) {
            // l'adresse email existe deja
            $message = "Cette adresse e-mail est déjà prise.";
        } else {
            // sinon c'est bon
            print "****ICI***";
            // structure de la table. requete preparee
            $requete = "insert into users(user_pseudo,user_email,user_pwd) values(:user_pseudo,:user_email,:user_pwd)";


            // structuration des parametres et envoi a la base

            $param = array(':name' => $name,':email' => $email, ':pwd' => $pwd);
            $req   = $connexion->prepare($requete);
            $req->bindParam(':user_pseudo',$name);
            $req->bindParam(':user_email',$email);
            $req->bindParam(':user_pwd',$pwd);


            $req->execute();

            $message = "Bienvenue $name, vous êtes maintenant inscrit au service.<br>Vous pouvez vous connecter en appuyant sur le bouton ci dessous. <br><h5><a href='.'>Connexion</a></h5>";

            $disppage = 1;
        }

    }
    else {
        $message = "Veuillez vérifier la longueur du nom, du prénom ou de votre mot de passe (entre 1 et 30 caractères).";
    }

}

// sinon on affiche le form

else {
    print "****LA***";


    $email = '';
    $name = '';
    $pwd = '';
}

?>

<div class="body-content">
    <div class="login-page">
        <div class="form-block">
            <h4>Inscription</h4>
            <?php echo $message; ?>

            <?php
                if($disppage == 0) {
                    echo "<form action='?action=inscription' method='post'>";
                }
                else {
                    echo "<form action='?' class='invisible' method='post'>";
                }
            ?>
            
                <div class="form-input">
                    <input type="email" placeholder="E-mail" name="email" id="email" required>
                </div>
                <div class="form-input">
                    <input type="text" placeholder="Pseudo" name="name" id="name" required>
                </div>
                <div class="form-input">
                    <input type="password" placeholder="Mot de passe" name="pwd" id="pwd" required>
                </div>
                <div class="form-input">
                    <button type="submit"><span class="material-icons">send</span></button>
                </div>
            </form>
        </div>
    </div>

</div>