<?php

    header("Content-Type: application/json; charset=UTF-8");
    header('Access-Control-Allow-Origin: *');

    try{
     $bdd = new PDO('mysql:host=localhost;dbname=test-json-dev2', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
        $requete = $bdd->prepare("SELECT * FROM utilisateurs");
        $requete->execute();
        $listeUtilisateur = $requete->fetchAll();

        echo json_encode($listeUtilisateur);

    }
    catch (PDOException $e) {
        echo 'Echec de la connexion : ' . $e->getMessage();
        exit;
    }

