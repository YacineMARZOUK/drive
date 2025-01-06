<?php
require_once "../classes/Database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modele = $_POST['modele'];
    $prixParJour = $_POST['prixParJour'];
    $disponibilite = $_POST['disponibilite'];
    $idCategorie = $_POST['idCategorie'];
    
    $database = new Database();
    $pdo = $database->getConnection();
    
    $query = "INSERT INTO vehicule (modele, prixParJour, disponibilite, idCategorie) 
              VALUES (:modele, :prixParJour, :disponibilite, :idCategorie)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':modele', $modele);
    $stmt->bindParam(':prixParJour', $prixParJour);
    $stmt->bindParam(':disponibilite', $disponibilite);
    $stmt->bindParam(':idCategorie', $idCategorie);
    
    if ($stmt->execute()) {
        echo "Error: Could not add vehicle.";
    
}
?>
