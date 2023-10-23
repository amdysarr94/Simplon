<?php
 session_start();
 $dbd  = new PDO("mysql:host=localhost;dbname=dbemployees; charset=utf8",'root','');
 if(isset($_POST['connecter'])){
    if(!empty($_POST['username']) && !empty($_POST['mtpasse'])){
        $username = htmlspecialchars($_POST['username']);
        $mtpasse = sha1($_POST['mtpasse']);
        $connexion_verify = $dbd -> prepare("SELECT * FROM `user` WHERE `Nom` = ? AND `Mot de passe` = ?");
        $connexion_verify -> execute(array($username, $mtpasse));
        if($connexion_verify-> rowCount()>0){
            $_SESSION['nom'] = $username;
            $_SESSION['mtdepasse']= $mtpasse;
            $recupid = "SELECT * FROM `user` WHERE `Nom` = '$username' AND `Mot de passe` = '$mtpasse'";
            $resultat = $dbd -> query($recupid) -> fetch();
            if ($resultat != null){
                $_SESSION['id']= $resultat['id_user'];
            }
           header("Location: userPage.php");

        } else {
            echo "La connexion a échouée";
        }
    }
 }

?>