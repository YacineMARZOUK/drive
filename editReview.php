<?php
require_once "classes/Database.php";
require_once "classes/avis.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['idAvis'])) {
    $idAvis = $_GET['idAvis'];

    $database = new Database();
    $pdo = $database->getConnection();

    $avis = new Avis($pdo);
    $review = $avis->getAvisById($idAvis); 

    if (!$review) {
        echo "<p class='text-red-500 text-center'>Review not found.</p>";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idAvis = $_POST['idAvis'];
    $commentaire = $_POST['commentaire'];
    $note = $_POST['note'];

    $database = new Database();
    $pdo = $database->getConnection();

    $avis = new Avis($pdo);
    $success = $avis->modifierAvis($idAvis, $commentaire, $note);

    if ($success) {
        header("Location: clientTab.php?message=review_updated");
        exit;
    } else {
        echo "<p class='text-red-500 text-center'>Error: Unable to update the review.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-16">
        <h2 class="text-3xl font-bold text-custom text-center mb-6">Edit Your Review</h2>
        <form action="editReview.php" method="POST" class="bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto">
            <input type="hidden" name="idAvis" value="<?= $review['idAvis'] ?>">

            <label for="commentaire" class="block text-gray-700 font-medium mb-2">Commentaire:</label>
            <textarea 
                name="commentaire" 
                id="commentaire" 
                rows="4" 
                class="w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-custom focus:border-transparent px-3 py-2"
                required
            ><?= htmlspecialchars($review['commentaire']) ?></textarea>

            <label for="note" class="block text-gray-700 font-medium mt-4 mb-2">Note (1-5):</label>
            <select 
                name="note" 
                id="note" 
                class="w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-custom focus:border-transparent px-3 py-2"
                required
            >
                <option value="1" <?= $review['note'] == 1 ? 'selected' : '' ?>>1 - Très mauvais</option>
                <option value="2" <?= $review['note'] == 2 ? 'selected' : '' ?>>2 - Mauvais</option>
                <option value="3" <?= $review['note'] == 3 ? 'selected' : '' ?>>3 - Moyen</option>
                <option value="4" <?= $review['note'] == 4 ? 'selected' : '' ?>>4 - Bon</option>
                <option value="5" <?= $review['note'] == 5 ? 'selected' : '' ?>>5 - Excellent</option>
            </select>

            <button 
                type="submit" 
                class="mt-6 w-full bg-custom text-white font-medium py-2 rounded-lg hover:bg-red-700 transition duration-300"
            >
                Update Review
            </button>
        </form>
    </div>
</body>
</html>
