<?php
require_once "classes/Database.php";
require_once "classes/avis.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idClient = $_POST['idClient'];
    $idVehicule = $_POST['idVehicule'];
    $commentaire = $_POST['commentaire'];
    $note = $_POST['note'];

    $database = new Database();
    $pdo = $database->getConnection();

    $avis = new Avis($pdo);
    $success = $avis->ajouterAvis($idClient, $idVehicule, $commentaire, $note);

    if ($success) {
        header("Location: allReviews.php?message=review_added");
        exit;
    } else {
        echo "<p class='text-red-500 text-center'>Error: Unable to add your review.</p>";
    }
}
?>
