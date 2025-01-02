<?php
session_start();

if (isset($_SESSION['idClient'])) {
    $idClient = $_SESSION['idClient'];
} else {
    echo "User not signed in.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation - Drive & Loc</title>
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
                <li><a href="./home.html" class="text-black hover:text-custom">Home</a></li>
                <li><a href="details.php" class="text-black hover:text-custom">Details</a></li>
                <li><a href="cars.php" class="text-black hover:text-custom">Cars</a></li>
                <li><a href="reservation.php" class="text-black hover:text-custom">Reservation</a></li>
            </ul>
        </div>
    </nav>

    <!-- Reservation Form -->
    <section class="py-16 bg-white">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-custom mb-8 text-center">Make a Reservation</h2>

            <form action="classes/reservation.php" method="POST" class="max-w-lg mx-auto bg-gray-100 p-8 rounded-lg shadow-lg">
                <!-- Vehicle Selection -->
                <div class="mb-4">
                    <label for="vehicle" class="block text-lg font-semibold text-gray-700">Select Vehicle</label>
                    <select id="vehicle" name="vehicle" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg" required>
                        <option value="Toyota Corolla">Toyota Corolla</option>
                        <option value="Ford Explorer">Ford Explorer</option>
                        <option value="Chevrolet Silverado">Chevrolet Silverado</option>
                        <option value="Tesla Model S">Tesla Model S</option>
                    </select>
                </div>

                <!-- Rental Dates -->
                <div class="mb-4">
                 <label for="date-start" class="block text-lg font-semibold text-gray-700">Start Date</label>
                           <input type="date" id="date-start" name="date-start" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                  <label for="date-end" class="block text-lg font-semibold text-gray-700">End Date</label>
                  <input type="date" id="date-end" name="date-end" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                  <label for="pickup-location" class="block text-lg font-semibold text-gray-700">Pick-Up Location</label>
                  <input type="text" id="pickup-location" name="pickup-location" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg" placeholder="Enter pick-up location" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full px-6 py-3 bg-custom text-white rounded-full hover:bg-gray-700">Submit Reservation</button>
            </form>
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
