<?php
require_once 'classes/Database.php';
require_once 'classes/avis.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idClient = $_POST['idClient'];
    $idVehicule = $_POST['idVehicule'];
    $commentaire = $_POST['commentaire'];
    $note = $_POST['note'];

    if (empty($commentaire) || empty($note) || !is_numeric($note) || $note < 1 || $note > 5) {
        die("Invalid input. Please try again.");
    }

    $database = new Database();
    $db = $database->getConnection();

    $avis = new avis($db);
    if ($avis->ajouterAvis($idClient, $idVehicule, $commentaire, $note)) {
        echo "Commentaire ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du commentaire.";
    }
}
?>
