<?php
    session_start();
?>
<?php
    $dbd  = new PDO("mysql:host=localhost;dbname=dbemployees; charset=utf8",'root','');

   if(isset($_POST['change'])){
    $idtache= $_SESSION['id_tache'];
   
    $sqlquery = $dbd -> prepare("UPDATE `tâches` SET `Statut`='Terminé' WHERE `id_tache`= ?");
    $sqlquery -> execute([$idtache]);
   
    header("Location: details_tache.php");
   }
?>