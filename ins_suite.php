<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_ins_suite.css">
    <title>formulaire d'inscription</title>
</head>
<body>
    <form method="post" action="ins_suite_bd.php" id="ins">
        <div class="haut">
            <h1>Bienvenue</h1>
            <p>Finalisez votre inscription en renseignant les informations manquantes.</p>
        </div>
        <div class="corps">
            <div class="gauche">
                <div class="entree">
                    <label>Prenom</label>
                    <input type="text" name="prenom">
                    
                </div>
                <div class="entree">
                    <label>Nom</label>
                    <input type="text" name="nom">
                    
                </div>
            </div>
            <div class="droite">
                <div class="entree">
                    <label>EMAIL</label>
                    <input type="email" name="email">
                    
                </div>
                <div class="entree">
                    <label>Téléphone</label>
                    <input type="tel" name="tele">
                    
                </div>
            </div>
        </div>
        <div class="pieds">
            <button type="submit" name="inscrire" form="ins">S'inscrire</button>
        </div>
    </form>
</body>
</html>