<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page d'accueil</title>
</head>
<body>
    <div class="container">
        <div class="left_container">
        <h2>Créer un compte</h2>
        <form action="inscription_traitement.php" method="post" id="ins">
            <div class="corps_form">
                <label for="nom">Nom d'utilisateur</label>
                <input type="text" name="nom" autocomplete="off">
            </div>
            <div class="corps_form">
                <label for="email">Adresse email</label>
                <input type="email" name="email">
            </div>
            <div class="corps_form">
                <label for="psw">Mot de passe</label>
                <input type="password" name="psw" autocomplete="off">
            </div>
            <div class="corps_form">
                 <label for="conpsw">Confirmation</label>
                 <input type="password" name="conpsw">
            </div>
            <button type="submit" for="ins" name="inscrire">Créer un compte</button>
        </form>
    </div>
    <div class="right_container">
        <h2>Connexion</h2>
        <form action="connexion_traitement.php" method="post" id="conn">
            <div class="corps_form">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" autocomplete="off">
            </div>
            <div class="corps_form">
                <label for="mtpasse">Mot de passe</label>
                <input type="password" name="mtpasse" id="mtpasse" autocomplete="off">
            </div>
            <div class="forgetten_password">
                <a href="#">mot de passe oublié</a>
            </div>
            <button type="submit" for="conn" name="connecter">Se connecter</button>
        </form>
    </div>
    </div>
       
    
</body>
</html>