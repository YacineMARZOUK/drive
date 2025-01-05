<?php
require_once "classes/Database.php";
require_once "classes/avis.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idAvis'])) {
    $idAvis = $_POST['idAvis'];

    $database = new Database();
    $pdo = $database->getConnection();

    $avis = new Avis($pdo);
    $success = $avis->supprimerAvis($idAvis);

    if ($success) {
        header("Location: clientTab.php?message=review_deleted");
        exit;
    } else {
        echo "<p class='text-red-500 text-center'>Error: Unable to delete the review.</p>";
    }
}
?>
