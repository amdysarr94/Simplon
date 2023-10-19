<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php
        $historique = 'historique.txt';
        $montanteneuros = 0;
        if(isset($_POST['submit'])){ 
         if(empty($_POST['monnaieencfa'])){
            echo "Veillez saisir une valeur dans le champs input";
         }elseif ($_POST['monnaieencfa']<0) {
            echo "Donner une valeur positive";
         } else {
            $monnaieencfa = floatval($_POST['monnaieencfa']);
            $montanteneuros = round($monnaieencfa/650, 2);
            
            file_put_contents($historique, date('Y-m-d H:i:s')." ". "$monnaieencfa CFA = $montanteneuros €\n", FILE_APPEND | LOCK_EX);
         }
            
        }
    
    ?>
        <div class="main">
            <form  action="" method="post">
                <input type="text" id="cfa" name="monnaieencfa">
                <label>monnaie</label>
                <button type="submit" name="submit">Convertir</button>
                <input type="text" name="supprimerentree">
                <input type="submit" name="supprimer" value="supprimer">
            </form>
            


        </div>
    <?php
        $lines = file($historique, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines !== false) {
        echo '<h2>Historique :</h2>';
        $historiqueParDate = [];

        foreach ($lines as $line) {
            list($date, $conversion) = explode(" ", $line, 2); 
            $historiqueParDate[$date][] = $conversion;
        }

        krsort($historiqueParDate);
        foreach ($historiqueParDate as $date => $conversions) {
            echo "<h3>$date</h3>";
            echo implode("<br>", $conversions);
            echo "<br><br>";
        }
      }
    ?>
    <?php
        if(isset($_POST['supprimer'])){
            $newhistorique = 'historique.txt';
            if(isset($_POST['supprimerentree'])){
                $dateasupprimer = $_POST['supprimerentree'];
            }
            
            $contenu = file($newhistorique);
            if ($contenu === false) {
                echo "Impossible de lire le fichier.";
                exit;
            }
            $newcontenu = array();
            foreach($contenu as $ligne){
                if(strpos($ligne, $dateasupprimer)=== false){
                    $newcontenu[] = $ligne; 
                }
            }
            if (file_put_contents($newhistorique, implode('', $newcontenu)) !== false) {
                echo "Ligne supprimée avec succès.";
            } else {
                echo "Impossible de mettre à jour le fichier.";
            }
        }
    ?>
    </body>
   
</html>