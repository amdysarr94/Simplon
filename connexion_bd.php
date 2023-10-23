<?php
    try{
        $db  = new PDO("mysql:host=localhost;dbname=dbemployees; charset=utf8",'root','');
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("oupps erreur de la connexion".$e->getMessage()) ;
    }
?>