<?php
// Ce script me permet d'enregistrer les données entrez dans mon formulaire home_page.php
// dans la bd etaxibokko.
    try {
        $db  = new PDO("mysql:host=localhost;dbname=etaxibokko; charset=utf8",'root','');
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("oupps erreur de la connexion".$e->getMessage()) ;
    }
    //récupération des données du formulaire :
        if(isset($_POST['email'])&& isset($_POST['psw'])){
           
            $email = htmlspecialchars($_POST['email']) ;
            $pwd = sha1($_POST['psw']);
            //préparation et exécution de requête sql
            //Eviter de mettre entre côte le placeholder
            $resql = $db -> prepare("INSERT INTO `users`(`Email`, `Mot de passe`) VALUES(:email, :psw)");
            $resql -> bindParam(':email', $email);
            $resql -> bindParam(':psw', $pwd);
            $resql -> execute();
        //    fermeture de la connexion 
            $db = null;
        //continuer l'inscription
        header("Location: ins_suite.php");
        }else {
            echo "non";
            die();
        }
?>