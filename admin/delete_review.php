<?php
session_start();

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    echo "Access denied.";
    exit;
}

require_once "../classes/Database.php";
require_once "../classes/avis.php";

$database = new Database();
$pdo = $database->getConnection();
if (isset($_POST['idAvis'])) {
    $idAvis = $_POST['idAvis'];
    $avisObj = new Avis($pdo);
    if ($avisObj->supprimerAvis($idAvis)) {
        header("Location: allReservation.php?status=success&message=Review deleted successfully.");
        exit;
    } else {
        header("Location: allReservation.php?status=error&message=Failed to delete review.");
        exit;
    }
} else {
    header("Location: allReservation.php?status=error&message=Invalid review ID.");
    exit;
}
?>
