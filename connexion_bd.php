<?php
    // connexion de la base de données
//    const HOST_NAME = "localhost";
//    const DB_NAME = "etaxibokko";
//    const USER_NAME = "root";
//    const PWD = "";
//    try{
//         $connexion = 'msql:host='.HOST_NAME.'; dbname ='.DB_NAME;
//         $monPDO = new PDO($connexion, USER_NAME, PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//    }catch(PDOException $e){
//         $message  = "erreur de connexion à la DB". $e -> getMessage();
//         die($message);
//    } à générer une erreur de driver résolu avec la méthode de Ciré ci-dessous
// l'erreur à dbname il y a pas d'espace






try {
    $db  = new PDO("mysql:host=localhost;dbname=etaxibokko; charset=utf8",'root','');
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("oupps erreur de la connexion".$e->getMessage()) ;
}
// if($db){
//     $req = "SELECT * FROM `users`";
//     $stmt = $db -> prepare($req);
//     $stmt -> execute();
//     $res1 = $stmt -> fetchAll();
//     echo "<pre>";
//     print_r($res1);
// } Quelques tests lors de l'affichage de la base de données. 
?>