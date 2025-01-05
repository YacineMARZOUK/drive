<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['idClient']) && isset($_GET['idVehicule'])) {
    $idClient = $_GET['idClient'];
    $idVehicule = $_GET['idVehicule'];
} else {
    echo "Invalid request.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Avis</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-16">
        <h2 class="text-3xl font-bold text-custom text-center mb-6">Add Your Review</h2>
        <form action="reviewSubmit.php" method="POST" class="bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto">
            <input type="hidden" name="idClient" value="<?php echo $idClient; ?>">
            <input type="hidden" name="idVehicule" value="<?php echo $idVehicule; ?>">

            <label for="commentaire" class="block text-gray-700 font-medium mb-2">Commentaire:</label>
            <textarea 
                name="commentaire" 
                id="commentaire" 
                rows="4" 
                class="w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-custom focus:border-transparent px-3 py-2"
                placeholder="Écrivez votre commentaire ici..." 
                required
            ></textarea>

            <label for="note" class="block text-gray-700 font-medium mt-4 mb-2">Note (1-5):</label>
            <select 
                name="note" 
                id="note" 
                class="w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-custom focus:border-transparent px-3 py-2"
                required
            >
                <option value="1">1 - Très mauvais</option>
                <option value="2">2 - Mauvais</option>
                <option value="3">3 - Moyen</option>
                <option value="4">4 - Bon</option>
                <option value="5">5 - Excellent</option>
            </select>

            <button 
                type="submit" 
                class="mt-6 w-full bg-custom text-white font-medium py-2 rounded-lg hover:bg-red-700 transition duration-300"
            >
                Envoyer le commentaire
            </button>
        </form>
    </div>
</body>
</html>
