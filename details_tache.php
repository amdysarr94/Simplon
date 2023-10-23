<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_detail.css">
    <title>Détails</title>
</head>
<body>
    

<?php
    
    $dbd  = new PDO("mysql:host=localhost;dbname=dbemployees; charset=utf8",'root','');
   if(isset($_GET['id'])){
        $idtache = $_GET['id'];
        $_SESSION['id_tache'] = $idtache;
        $sqlquery = $dbd -> prepare("SELECT * FROM `tâches` WHERE  `id_tache` = ?");
        $sqlquery->execute([$idtache]);
        while($row = $sqlquery->fetch()){
            echo "<header>";
            echo "<h2>Détails tâche : ".  $row['Titre'] ."</h2><br>";
            echo $_SESSION['nom'];
            echo "</header>";
            echo "<div class='container'>";    //commencement div container
            echo "<h3>". $row['Titre'] ."</h3>";
            echo "<div class='etat'>"; //commencement div etat
            echo "<div class= 'prio'>";//commencement div prio
            echo "<p id='red'>Priorité :". " ".$row['Priorité']. "</p>";
            echo "</div>"; //fin div prio
            echo "<div class='stat'>"; //commencement div stat
            echo  "<p id='green'>Statut :". " ". $row['Statut']."</p>";
            echo "</div>"; //fin div stat
            echo "<div>"; //fin div etat
            echo "<div class='des'>";
            echo "<p>". $row['description']. "</p>";
            echo "</div>";
            echo "<div class='submit'>"; //commencement div submit
            echo "<form action= 'etat_traitement.php' method = 'post' id= 'chang'>
            <input type='text' name='id' value=$idtache hidden>";
            echo "<button type='submit' name='change' for= 'chang' id='changer'>Marquer comme terminée</button>";
            echo "</form>";
            echo "<form action= 'supprime_traitement.php' method = 'post' id='supp'>
            <input type='text' name='id' value=$idtache hidden>";
            echo "<button type='submit' name='suppr' for='supp' id='supprimer'>Supprimer la tâche</button>";
            echo "</form>";
            echo "</div>"; //fin de la div submit
            echo "</div>"; //fin de la div container
            echo "<style>";//début style <style>
            echo "body{";
            echo "background-color: rgb(244, 244, 244);";
            echo "}";
            echo "header{";
            echo "background-color: green;";
            echo "color : white;";
            echo "text-align: center;";
            echo "}";
            echo ".container{";
            echo "background-color: white;";
            echo "display: flex;";
            echo "flex-direction: column;";
            echo "width = 80%;";
            echo "margin-left: 100px;";
            echo "margin-right: 260px;";
            echo "}";
            // echo ".etat{";
            // echo "display: flex;
            // flex-direction : row;";

            // echo "}";
            echo "#red{";
            echo "color : red;";
            echo "}";
            echo "#green{";
            echo "color : green;";
            echo "}";
            echo ".submit{";
            echo "display: flex;";
            echo "}";
            echo "#changer{";
            echo "background-color: green;";
            echo "color: white;";
            echo "padding: 10px;";
            echo "margin: 10px;";
            echo "}";
            echo "#supprimer{";
            echo "background-color: red;";
            echo "color: white;";
            echo "padding: 10px;";
            echo "margin: 10px;";
            echo "}";
            echo ".des{";
            // echo "display: flex;";
            // echo "flex-direction: row;";
            echo "} 
            h3{ 
                margin-left: 30px;
            }
            p{
                margin-left: 30px;
            }";
            echo "</style>";//fin du style
        }
    }
    

?>
<a href="userPage.php" >Retour à la liste des taches</a>
    </body>
</html>