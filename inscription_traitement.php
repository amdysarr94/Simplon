<?php
     $dbd  = new PDO("mysql:host=localhost;dbname=dbemployees; charset=utf8",'root','');
     if(isset($_POST['inscrire'])){
        if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['psw']) && !empty($_POST['conpsw'])){
            if((!empty($_POST['psw'])) && !empty($_POST['conpsw'])){
                if($_POST['psw'] == $_POST['conpsw']){
                    if(!preg_match('/^[A-Za-z ]+$/', $_POST['nom'])){
                        echo "Le prénom et le nom doivent contenir uniquement des lettres.";
                        header("Location: pageAcc.php");
                        
                    }
                    $nom = htmlspecialchars($_POST['nom']);
                    //vérifier si l'email est unique
                    
                    $checkquery = $dbd -> prepare("SELECT * From `user` WHERE Email = :email");
                    $checkquery -> bindValue(':email', $_POST['email']);
                    $checkquery -> execute();
                    if($checkquery-> rowCount()>0){
                        echo "L'email renseigné existe déjà! Veuillez saisir un autre";
                        header("Location: pageAcc.php");
                        
                    } else {
                        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                    }
                   
                    if (strlen($_POST['psw']) < 7 || !preg_match('/[!@#$%^&*(),.?":{}|<>0-9A-Za-z]+/', $_POST['psw'])){
                        echo "Le mot de passe n'est pas valide";
                        header("Location: pageAcc.php");
                       
                    }
                    $motdepasse = sha1($_POST['psw']);
                    // requête préparée d'insertion des données d'inscription
                    $reqsql = $dbd -> prepare("INSERT INTO `user`(`Nom`, `Email`, `Mot de passe`) VALUES (:nom, :email, :motdepasse)");
                    $reqsql -> bindParam(':nom', $nom);
                    $reqsql -> bindParam(':email', $email);
                    $reqsql -> bindParam(':motdepasse', $motdepasse);
                    $reqsql -> execute();
                    $dbd = null;
                    header("Location: pageAcc.php");
                }else {
                    echo "Veillez confirmer votre mot de passe";
                }
            }
        } else {
            echo "Veillez remplir tous les champs";
           
        }
     }
?>