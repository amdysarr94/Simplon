<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $userid = $_SESSION['id'];
        $titre = $_POST['titre'];
        //reste à gérer la dateexp pour qu'on ne puisse pas mettre une date dépassé.
        $dateexp = $_POST['date'];
        $priorite = $_POST['priority'];
        $statut = $_POST['statut'];
        $description = $_POST['des'];
        try{
            $dbd  = new PDO("mysql:host=localhost;dbname=dbemployees; charset=utf8",'root','');
            $dbd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sqlquery = $dbd -> prepare("INSERT INTO `tâches`( `Titre`, `Priorité`, `Statut`, `échéance`, `description`, `id_user`) VALUES (?, ?, ?, ?, ?, ?)");
            $sqlquery ->execute([$titre, $priorite, $statut, $dateexp, $description, $userid]);
            header("Location: userPage.php");
        } catch(PDOException $e) {
            die("oupps erreur de la connexion".$e->getMessage()) ;
        }
    }
?>