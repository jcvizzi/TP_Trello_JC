<?php

// récupération des données Json
$data_json = file_get_contents('php://input');

// vérification du json
$data = json_decode($data_json) ;
if (! $data) {
    http_response_code(415);
    exit();
} elseif (! $data->prenom || ! $data->nom || ! $data->email || ! $data->mdp) {
    http_response_code(400);
    exit();
}



// sauvegarde des données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=trello_bd','trellobd','HzKIl0IqevqabX8K');

    $sql = "INSERT INTO `gestionUtilisateurs` (`nom`, `prenom`, `email`, `mdp`) VALUES ('$data->nom', '$data->prenom', '$data->email', '$data->mdp');";
    $req = $pdo->prepare($sql);
    $req->execute();

    $req = null;
    $pdo = null;

} catch (PDOException $e) {
    http_response_code(500);
    die();
}

?>




