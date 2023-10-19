<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>diagnostique Covid</title>
</head>
<body>
    <h1>Formulaire de diagnostique du Covid-19</h1>
    

    <form action="" method="post">
    <h2>Identité</h2>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" >
        <label for="prenom">Prenom:</label>
        <input type="text" name="prenom" id="prenom" >
        <label for="poids">Poids:</label>
        <input type="number" name="poids" min = "7" placeholder="Entrez ici votre poids" >
        
        <h2>Sensations actuelles</h2>
       
        <label for="temperature">Donnez votre température actuelle:</label>
        <input type="number" name="temperature" min ="32" max="42" placeholder="Entrez votre température" ><br>
        
        <label for="reponse1">Avez-vous des maux de tête ?</label>
        <input type="radio" id="" value="oui" name="reponse1" >Oui
        
        <input type="radio" id="tete_non" value="non" name="reponse1">Non<br>

        <label for="reponse2">Avez-vous une toux sévère et répétée?</label>
        <input type="radio" id="toux_oui" value="oui" name="reponse2" >Oui
        
        <input type="radio" id="toux_non" value="non" name="reponse2">Non<br>
       
        <label for="reponse3">Avez-vous perdu du poids ces dernières semaines?</label>
        <input type="radio" id="perte_oui" value="oui" name="reponse3" >Oui
        
        <input type="radio" id="perte_non" value="non" name="reponse3">Non<br>
        
        <label for="reponse4">Vous faites partie de quelle catégorie d'âge ?</label>
        <input type="radio" id="age_1" value="0 - 18 ans" name="reponse4" >0 - 18 ans
       
        <input type="radio" id="age_2" value="18 - 35 ans" name="reponse4">19 - 35 ans
        
        <input type="radio" id="age_3" value="36 - 55 ans" name="reponse4">36 - 55 ans
        <input type="radio" id="age_4" value="autres" name="reponse4">Autres<br>
        <input type="submit" value="Envoyer">
       
    </form>

<?php
        session_start();
        $informations = array();
        $entry_id = uniqid();
        $nom = "";
        $prenom = "";
        $poids = "";
        $temperature = "";
        $reponse1 = "";
        $reponse2 = "";
        $reponse3 = "";
        $reponse4 = "";
        $erreurs = array();
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            function nettoyerChaine($chaine) {
                // Supprimer les balises HTML et échapper les caractères spéciaux
                $chaine = strip_tags($chaine);
                $chaine = htmlspecialchars($chaine);
                return $chaine;
            }
            $nom = nettoyerChaine($nom);
            $prenom = nettoyerChaine($prenom);
            if (empty(trim($nom)) || empty(trim($prenom)) || strlen($nom)>150 || strlen($prenom)>150) {
                $erreurs[] = "Insérez votre nom et/ou votre prénom.";
                die();
            }elseif(preg_match('/[0-9]/', $nom) || preg_match('/[0-9]/', $prenom)) {
                $erreurs[] = "Le nom et/ou le prénom ne doit pas contenir de chiffres.";
                // die();
            }
            $poids = $_POST["poids"];
            
            if ($poids < 7 || $poids > 250) {
                $erreurs[] = "Le poids doit être supérieur ou égal à 7 kg et inférieur à 250 kg.";
                // die();
            }
            $temperature = $_POST["temperature"];
            if ($temperature < 31 || $temperature >= 42){
                $erreur[] = "Entrez une température valable.";
                // die();
            }
            if(isset($_POST["reponse1"])){
                $reponse1 = $_POST["reponse1"];
            }
            if(isset($_POST["reponse2"])){
                $reponse2 = $_POST["reponse2"];
            }
            if(isset($_POST["reponse3"])){
                $reponse3 = $_POST["reponse3"];
            }
            if(isset($_POST["reponse4"])){
                $reponse4 = $_POST["reponse4"];
            }
           
            if (!in_array($reponse1, ["oui", "non"]) || !in_array($reponse2, ["oui", "non"]) ||
                !in_array($reponse3, ["oui", "non"]) || !in_array($reponse4, ["0 - 18 ans", "18 - 35 ans", "36 - 55 ans", "autres"])) {
                    $erreurs[] = "Veuillez sélectionner des réponses valides pour les questions.";
                    // die();
            }
           if($temperature >= 35 || $temperature == 42) {
                $valeursondagetemp = 20;
           } elseif ($temperature>= 32 || $temperature <= 35){
                $valeursondagetemp = 9;
           }else {
                $valeursondagetemp = 0;
           }
           if($reponse1 === "oui"){
            $valeursondagehead = 20;
           }elseif($reponse1==="non"){
            $valeursondagehead = 7;
           } else {
            $valeursondagehead = 0;
           }
           if($reponse2 === "oui"){
            $valeursondagetoux = 20;
           }elseif($reponse2==="non"){
            $valeursondagetoux = 7;
           } else {
            $valeursondagetoux = 0;
           }
           if($reponse3 === "oui"){
            $valeursondageweight = 20;
           }elseif($reponse3==="non"){
            $valeursondageweight = 7;
           } else {
            $valeursondageweight = 0;
           }
           if($reponse4 === "0 - 18 ans"){
                $valeursondageage = 5;
           }elseif($reponse4 === "18 - 35 ans"){
                $valeursondageage = 13;
           }elseif($reponse4 === "36 - 55 ans"){
                $valeursondageage = 15;
           }else{
            $valeursondageage = 18;
           }
           $valeursondage = $valeursondagetemp + $valeursondageage + $valeursondageweight+ 
           $valeursondagetoux+ $valeursondagehead;
           if($valeursondage >= 70) {
                $avis = "Vous avez peut être contracter le covid.
                Rapprochez-vous d'une structure de santé pour faire un test avancé.";
           }elseif ($valeursondage <= 50){
                $avis = "La probabilité que vous ayez le covid est faible";
           }else {
                $avis = "Vous n'avez pas de risque de contamination. 
                Guêtez tout de même l'apparution des signes annonciateurs de la maladie.";
           }
           $informations = array(
            "ID" => $entry_id,
            "Nom" => $nom,
            "Prénom" => $prenom,
            "Taux de chance d'attraper le covid" => $valeursondage,
            "Notre avis sur vos symptômes" => $avis
           );
           if (!isset($_SESSION['donnees_formulaire'])) {
            $_SESSION['donnees_formulaire'] = array();
        }
        $_SESSION['donnees_formulaire'][$entry_id] = $informations;
       
    }
    
    
    ?> 
    <?php 
       
        if (!empty($erreurs)) {
            echo "Erreurs :<br>";
            foreach ($erreurs as $erreur) {
                echo "- " . $erreur . "<br>";
            }
        } else {
            echo "<h1>Données enregistrées :</h1>";
            if(isset($_SESSION['donnees_formulaire'])  && is_array($_SESSION['donnees_formulaire'])){
                foreach ($_SESSION['donnees_formulaire'] as $entry_id => $donnees){
                    echo "ID : " . $donnees['ID'] . "<br>";
                    echo "Nom : " . $donnees['Nom'] . "<br>";
                    echo "Prénom : " . $donnees['Prénom'] . "<br>";
                    echo "Taux de contagion :"  .$donnees["Taux de chance d'attraper le covid"] . " \n" ."<br>";
                    echo "Avis : " .$donnees['Notre avis sur vos symptômes'] ."<br><br>";
                }
            }else {
                echo "<p>Aucune valeur n'est entrée</p>";
            }
        }
        
    ?>    
</body>
</html>