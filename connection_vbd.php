<?php
    $dbd  = new PDO("mysql:host=localhost;dbname=etaxibokko; charset=utf8",'root','');
    if(isset($_POST['connect'])){
        if(!empty($_POST['email']) && !empty($_POST['psw'])){
            $username = htmlspecialchars($_POST['email']);
            $userpsw = sha1($_POST['psw']); 
            $recupuser = $dbd ->prepare("SELECT * FROM `users` WHERE `Email` = ? AND `Mot de passe` = ?");
            $recupuser -> execute(array($username, $userpsw));
            if($recupuser-> rowCount()>0){
                echo "connexion réussie";
            } else {
                echo "votre nom d'utilisateur ou votre mot de passe est incorrecte";
                 header("Location: ins_page.php");
            }
        }
    }
?>