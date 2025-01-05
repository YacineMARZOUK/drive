<?php
require_once "classes/Database.php";
require_once "classes/avis.php";

$database = new Database();
$pdo = $database->getConnection();

$avis = new Avis($pdo);
$allReviews = $avis->getAllAvis();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Reviews</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto py-16">
        <h2 class="text-3xl font-bold text-red-700 text-center mb-6">All Reviews</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Review ID</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Client ID</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Vehicle ID</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Comment</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($allReviews)): ?>
                        <?php foreach ($allReviews as $review): ?>
                            <tr>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $review['idAvis'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $review['idClient'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $review['idVehicule'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= htmlspecialchars($review['commentaire']) ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $review['note'] ?>/5</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-gray-800 text-center border-b">No reviews found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
