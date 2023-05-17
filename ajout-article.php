<?php

include 'header-json.php';

$json = file_get_contents('php://input');
$donneesFormulaire = json_decode($json, TRUE);

try{

    include 'bdd.php';

    $requete = $bdd->prepare("INSERT INTO article (nom, contenu, date)
                                VALUES (:nom, :contenu,  NOW() )");

    $requete->execute([
        "nom" => $donneesFormulaire["nom"],
        "contenu" => $donneesFormulaire["contenu"]
    ]);

    echo '{"message" : "L\'article a été ajouté"}';

} catch (PDOException $e) {
    echo 'Echec de la connexion : ' . $e->getMessage();
    exit;
}