<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_user.css">
    <title>Page utilisateur</title>
</head>
<body>
    <header>
        <h1>Gestion de mes tâches</h1>
        <p><?php echo $_SESSION['nom'] . "<br>"?></p>
    </header>
    <!-- Affichage des tâches enregistrées -->
    <?php 
        $dbd  = new PDO("mysql:host=localhost;dbname=dbemployees; charset=utf8",'root','');
        $userid = $_SESSION['id'];
        $sqlquery = $dbd -> prepare("SELECT * FROM `tâches` WHERE  `id_user` = ?");
        $sqlquery->execute([$userid]);
        
        // Affichage des tâches :
        while($row = $sqlquery->fetch()){
           
            echo "<div class='tacheen'>";
            echo "<style>";
            echo ".tacheen {";
            echo "background-color : white;";
            // echo "display: flex;";
            // echo "flex-direction: row;";
            echo "width: 80%;";
            echo "margin-left: 100px;";
            echo "}";
            echo "#red{";
            echo "color: red;";
            echo "}";
            echo "#green{";
            echo "color: green;";
            echo "}";
            echo ".tachecon{";
            
            // echo "display: inline;";
            // // echo "flex-direction: row;";
            // // echo "#details{";
            // // echo "width = 100%;";
            // // echo "left: 300px;";
            // // echo "bottom: 25px;";
            // echo "}";
            echo "a{";
            echo "color: white;";
            echo "text-decoration: none;";
            echo "}";    
            echo "</style>";
            echo "<h3>". $row['Titre']. "</h3>";
            echo "<p>". $row['description']. "</p>";
            echo "<div class='tachecon'>";
            echo "<div class='prio'>";
            echo "<p id='red'>Priorité :". " ".$row['Priorité']. "</p>";
            echo "</div>";
            echo "<div class='sta'>";
            echo  "<p id='green'>Statut :". " ". $row['Statut']."</p>";
            echo "</div>";
            echo "<div class='but'>";
            echo "<button id='details'><a href='details_tache.php?id=" . $row['id_tache'] . "' target='_blank'>Voir les détails</a></button></div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";



        }
        // $test -> $sqlquery->fetch();
        // $_SESSION['id_tache'] = $test['id_tache'];
    ?>
    <h2>Ajouter une nouvelle tâche</h2>
   
    <div class="container">
        <form method="post" action="tache_traitement.php" id="tache">
            <div class="title">
                <label for="titre">Titre:</label>
                <input type="text" name="titre" id="titre">
            </div>
            <div class="date">
                <label for="date">date d'expiration : </label>
                <input type="datetime-local" name="date" id="date">
            </div>
            <div class="priorite">
                <label for="prior">Priorité :</label>
                <select name="priority" id="prior">
                    <option value="haute">Haute</option>
                    <option value="moyenne">Moyenne</option>
                    <option value="basse">Basse</option>
                </select>
            </div>
            <div class="statut">
                <label for="stat">Statut :</label>
                <select name="statut" id="stat">
                    <option value="en cours">En cours</option>
                    <option value="en attente">En attente</option>
                    <option value="terminé">Terminé</option>
                </select>
            </div>
            <div class="descript">
                <label for="des">Description :</label>
                <textarea name="des" id="des" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" name="ajouter" for="tache">Ajouter</button>
        </form>
    </div>
</body>
</html>