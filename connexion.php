<!DOCTYPE html>
<!-- Page de connexion -->
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_home_page.css">
    <title>Connexion</title>
</head>
<body>
    <form action="connection_vbd.php" method="post" id="user">
        <div class="corps_form">
            <div class="haut">
                <div class="titre">
                    <h2>Connexion</h2>
                </div>
               <div class="description">
                <p>Votre chauffeur en un clic!</p>
               </div>
                <div class="gros_boutton">
                    <button>Continuer avec Facebook</button>
                </div>
                <hr>
                <div class="separe">
                    <p>ou</p></div>
            </div>
            <div class="milieux">
                <div class="input">
                    <label for="email">EMAIL</label>
                    <input type="email" name="email">
                </div>
                <div class="input">
                    <label for="psw">MOT DE PASSE</label>
                    <input type="password" name="psw">
                    <div class="show_img">
                        <img src="Images/eye.ico">
                    </div>
                </div>
            </div>
            <div class="bas">
                <div class="already_user">
                    <a href="#">J'ai déjà un compte</a>
                </div>
                <div class="petit_boutton">
                    <button  type="submit" name="connect" form="user">Se Connecter</button>
                    
                    <div class="arrow_img">
                        <img src="Images/arrow.ico">
                    </div>
                </div>
            </div>
        </div>
    </form>
    
</body>
</html>