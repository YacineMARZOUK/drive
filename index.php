<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive & Loc</title>
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
                <li><a href="./Clients/clients.php" class="text-black hover:text-custom">Clients</a></li>
                <li><a href="" class="text-black hover:text-custom">Cars</a></li>
                <li><a href="./Contrats/contrats.php" class="text-black hover:text-custom">Contrats</a></li>
            </ul>
            
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero bg-cover bg-center py-20" style="background-image: url('img/car-background.png');">
        <div class="container mx-auto pl-10">
            <h1 class="text-4xl font-bold text-white mb-4">Your Next Adventure <br><span class="text-custom">Starts Here</span></h1>
            <p class="text-lg text-white mb-6">Rent Your <span class="text-custom font-bold">Dream Car</span> Today!</p>
            <a href="login/login.php" class="px-6 py-3 bg-custom text-white rounded-full hover:bg-gray-700">Sign Up</a>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8 text-custom">Browse By Category</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div class=" p-6 rounded-lg shadow">
                    <img src="img/trucks.jpeg" alt="Sedan" class="rounded h-[200px] mx-auto mb-4">
                    <h3 class="text-xl font-bold text-black">Sedans</h3>
                </div>
                <div class="p-6 rounded-lg shadow">
                    <img src="img/trucks.jpeg" alt="SUV" class="rounded h-[200px] mx-auto mb-4">
                    <h3 class="text-xl font-bold text-black">SUVs</h3>
                </div>
                <div class=" p-6 rounded-lg shadow">
                    <img src="img/trucks.jpeg" alt="Truck" class="rounded h-[200px] mx-auto mb-4">
                    <h3 class="text-xl font-bold text-black">Trucks</h3>
                </div>
                <div class=" p-6 rounded-lg shadow">
                    <img src="img/trucks.jpeg" alt="Luxury" class="rounded h-[200px] mx-auto mb-4">
                    <h3 class="text-xl font-bold text-black">Luxury</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold  mb-8 text-custom">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <img src="img/select.jpeg" alt="Select" class="h-[200px] mx-auto mb-4 rounded">
                    <h3 class="text-xl font-bold text-black">Select Your Car</h3>
                    <p class="text-custom">Browse our catalog and find the perfect vehicle for your needs.</p>
                </div>
                <div>
                    <img src="img/booknow.jpg" alt="Book" class="h-[200px] mx-auto mb-4 rounded">
                    <h3 class="text-xl font-bold text-black">Book Online</h3>
                    <p class="text-custom">Reserve your car and pick your dates online in just a few clicks.</p>
                </div>
                <div>
                    <img src="img/driveee.avif" alt="Drive" class="h-[200px] mx-auto mb-4 rounded">
                    <h3 class="text-xl font-bold text-black">Drive Away</h3>
                    <p class="text-custom">Pick up your car and enjoy your trip hassle-free.</p>
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
