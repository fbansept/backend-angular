<?php
include 'header-json.php';

$json = file_get_contents('php://input');
$donneesFormulaire = json_decode($json, TRUE);

try{
    $bdd = new PDO(
        'mysql:host=localhost;dbname=backend-angular', 
        'root', 
        '', 
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ));

    $requete = $bdd->prepare("SELECT * 
                                FROM utilisateur 
                                WHERE email = :email 
                                AND password = :password");

    $requete->execute([
        "email" => $donneesFormulaire["email"],
        "password" => $donneesFormulaire["password"]
    ]);

    $utilisateur = $requete->fetch();

    if($utilisateur) {
        echo json_encode($utilisateur);
    } else {
        $erreur = ["message" => "utilisateur inconnu"];
        echo json_encode($erreur);
    }
}
catch (PDOException $e) {
    echo 'Echec de la connexion : ' . $e->getMessage();
    exit;
}