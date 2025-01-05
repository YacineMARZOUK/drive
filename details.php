<?php
session_start();
require_once "classes/Database.php";
require_once "classes/vehicle.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Vehicle ID not provided.";
    exit;
}

$idVehicule = $_GET['id'];

$db = (new Database())->getConnection();
$vehicleModel = new Vehicle($db);

$vehicle = $vehicleModel->getVehicleById($idVehicule);

if (!$vehicle) {
    echo "Vehicle not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Details - Drive & Loc</title>
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
                <img src="img/logooo.png" alt="Car Logo" class="h-10 mr-3">
                <a href="index.php" class="text-lg font-bold text-custom">Drive & Loc</a>
            </div>
            <ul class="hidden md:flex space-x-6 text-gray-800">
                <li><a href="index.php" class="text-black hover:text-custom">Home</a></li>
                <li><a href="details.php" class="text-black hover:text-custom">Details</a></li>
                <li><a href="vehicle.php" class="text-black hover:text-custom">Cars</a></li>
                <li><a href="./Contrats/contrats.php" class="text-black hover:text-custom">Contrats</a></li>
            </ul>
        </div>
    </nav>

    <!-- Vehicle Details Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8 text-custom">Vehicle Details</h2>
            <div class="flex justify-center">
                <div class="w-full max-w-4xl bg-gray-50 p-6 rounded-lg shadow-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <img src="img/<?= htmlspecialchars($vehicle['image']) ?>" alt="<?= htmlspecialchars($vehicle['modele']) ?>" class="rounded-lg shadow-lg w-full mb-4">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h3 class="text-2xl font-bold text-black mb-4"><?= htmlspecialchars($vehicle['modele']) ?></h3>
                            <div class="text-lg text-black font-bold mb-4">
                                <p>Price: $<?= htmlspecialchars($vehicle['prixParJour']) ?>/day</p>
                                <p>Availability: <?= htmlspecialchars($vehicle['disponibilite']) ?></p>
                            </div>
                            <a href="reservation.php?id=<?= htmlspecialchars($vehicle['idVehicule']) ?>" class="px-6 py-3 bg-custom text-white rounded-full hover:bg-gray-700">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-white py-8">
        <div class="container mx-auto flex flex-col md:flex-row justify-between">
            <div class="mb-4">
                <h3 class="text-xl font-bold">Drive & Loc</h3>
                <p>Rent your dream car with ease.</p>
            </div>
            <ul class="flex space-x-6">
                <li><a href="#" class="hover:text-custom">Privacy Policy</a></li>
                <li><a href="#" class="hover:text-custom">Terms of Service</a></li>
                <li><a href="#" class="hover:text-custom">Contact Us</a></li>
            </ul>
            <div class="flex space-x-4">
                <a href="#"><i class="fa-brands fa-facebook text-2xl"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter text-2xl"></i></a>
                <a href="#"><i class="fa-brands fa-instagram text-2xl"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>
