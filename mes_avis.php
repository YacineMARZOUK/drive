<?php
// Include the Database and avis classes
require_once 'classes/Database.php';
require_once 'classes/avis.php';

// Get the database connection
$database = new Database();
$db = $database->getConnection();

// Create an avis object
$avis = new avis($db);

// Example client ID (replace with actual ID)
$idClient = 8;

// Fetch reviews for the specific client
try {
    $clientAvis = $avis->getAvisByClient($idClient);

    // Display the reviews
    if (!empty($clientAvis)) {
        foreach ($clientAvis as $review) {
            echo "Commentaire: " . htmlspecialchars($review['commentaire']) . "<br>";
            echo "Note: " . htmlspecialchars($review['note']) . "<br>";
            echo "<hr>";
        }
    } else {
        echo "No reviews found for this client.";
    }
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Avis</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file -->
</head>
<body>
    <header>
        <h1>Mes Avis</h1>
        <a href="dashboard.php">Retour au tableau de bord</a>
    </header>

    <main>
        <?php if (!empty($reviews)): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Véhicule</th>
                        <th>Commentaire</th>
                        <th>Note</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews as $index => $review): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($review['idVehicule']) ?></td>
                            <td><?= htmlspecialchars($review['commentaire']) ?></td>
                            <td><?= htmlspecialchars($review['note']) ?>/5</td>
                            <td><?= htmlspecialchars($review['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Vous n'avez encore soumis aucun avis.</p>
        <?php endif; ?>
    </main>
</body>
</html>
