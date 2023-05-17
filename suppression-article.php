<?php

include 'header-json.php';

try{

    include 'bdd.php';

    $requete = $bdd->prepare("DELETE FROM article WHERE id = :id");

    $requete->execute(["id" => $_GET['id']]);

   // echo '{"message" => "L\'article a bien été supprimé"}';
   echo json_encode(["message" => "L'article a bien été supprimé"]);

} catch (PDOException $e) {
    echo 'Echec de la connexion : ' . $e->getMessage();
    exit;
}