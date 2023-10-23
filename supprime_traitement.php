<?php
session_start();
$dbd  = new PDO("mysql:host=localhost;dbname=dbemployees; charset=utf8",'root','');
if(isset($_POST['suppr'])){
    $idtache= $_SESSION['id_tache'];
    $sqlquery = $dbd -> prepare("DELETE FROM `tâches` WHERE `id_tache`= ?");
    $sqlquery->execute([$idtache]);
    header("Location: userPage.php");
}

?>