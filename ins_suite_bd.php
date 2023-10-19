<?php
    try {
        $db  = new PDO("mysql:host=localhost;dbname=etaxibokko; charset=utf8",'root','');
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    } catch (PDOException $e) {
        die("oupps erreur de la connexion".$e->getMessage()) ;
    }
    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['tele'])){
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $email = $_POST['email'];
        $tele = $_POST['tele'];
        // requête sql d'ajout des informations sur la base de données 
        $resql1 = $db -> prepare("INSERT INTO `usersvalidation`(`Prénom`, `Nom`, `Email`, `Téléphone`) VALUES(:prenom, :nom, :email, :tele)");
        $resql1 -> bindParam(':prenom', $prenom);
        $resql1 -> bindParam(':nom', $nom);
        $resql1 -> bindParam(':email', $email);
        $resql1 -> bindParam(':tele', $tele);
        $resql1 -> execute();
        // fermeture de la connexion
      
        echo "Inscription réussie";
        $db = null;
    } else {
        echo "erreur de connexion";
        die();
    }
?>