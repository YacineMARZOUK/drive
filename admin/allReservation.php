<?php
session_start();
if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    echo "Access denied.";
    exit;
}

require_once "../classes/Database.php";
require_once "../classes/Reservation.php";
require_once "../classes/avis.php";

$database = new Database();
$pdo = $database->getConnection();


$reservations = Reservation::afficherAllReservation($pdo);


$avisObj = new Avis($pdo);
$avisList = $avisObj->getAllAvis();

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your Reservations - Drive & Loc</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            .text-custom { color: #ff0000; }
            .bg-custom { background-color: #ff0000; }
            .hover\:bg-custom:hover { background-color: #cc0000; }
        </style>
    </head>
    <body class="bg-gray-100">

        <!-- Header -->
        <nav class="bg-white shadow-lg">
            <div class="container mx-auto flex items-center justify-between py-4 px-6">
                <div class="flex items-center">
                    <img src="../img/logooo.png" alt="Car Logo" class="h-10 mr-3">
                    <a href="index.php" class="text-lg font-bold text-custom">Drive & Loc</a>
                </div>
                <ul class="hidden md:flex space-x-6 text-gray-800">
                    <li><a href="./home.html" class="text-black hover:text-custom">Home</a></li>
                    <li><a href="details.php" class="text-black hover:text-custom">Details</a></li>
                    <li><a href="cars.php" class="text-black hover:text-custom">Cars</a></li>
                    <li><a href="reservation.php" class="text-black hover:text-custom">Reservation</a></li>
                </ul>
            </div>
        </nav>

<!-- All Reservations -->
<section class="py-16 bg-white">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-custom mb-8 text-center">All Reservations</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Reservation ID</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Client ID</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Vehicle ID</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Start Date</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">End Date</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Pick-Up Location</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($reservations !== 404 && !empty($reservations)): ?>
                        <?php foreach ($reservations as $reservation): ?>
                            <tr>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $reservation['idReservation'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $reservation['idClient'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $reservation['idVehicule'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $reservation['dateDebut'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $reservation['dateFin'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $reservation['lieuPriseEnCharge'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= ucfirst($reservation['statutReservation']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="px-4 py-2 text-gray-800 text-center border-b">No reservations found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- All Reviews -->
<section class="py-16 bg-white">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-custom mb-8 text-center">All Reviews</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Review ID</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Client ID</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Vehicle ID</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Comment</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Rating</th>
                        <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Actions</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($avisList)): ?>
                        <?php foreach ($avisList as $avis): ?>
                            <tr>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $avis['idAvis'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $avis['idClient'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $avis['idVehicule'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= htmlspecialchars($avis['commentaire']) ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b"><?= $avis['note'] ?></td>
                                <td class="px-4 py-2 text-gray-800 border-b">
                                    <!-- Delete button -->
                                    <form action="delete_review.php" method="POST" class="inline">
                                        <input type="hidden" name="idAvis" value="<?= $avis['idAvis'] ?>">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-gray-800 text-center border-b">No reviews found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


</body>
</html>
