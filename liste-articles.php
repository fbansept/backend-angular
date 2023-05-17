<?php

include 'header-json.php';

try{

    include 'bdd.php';

    $requete = $bdd->prepare("SELECT * FROM article");

    $requete->execute();

    $listeArticle = $requete->fetchAll();

    echo json_encode($listeArticle);

} catch (PDOException $e) {
    echo 'Echec de la connexion : ' . $e->getMessage();
    exit;
}