<?php
session_start();
require_once "Database.php";
require_once "vehicle.php";

$db = (new Database())->getConnection(); 
$vehicleModel = new Vehicle($db);
$vehicles = $vehicleModel->getVehicles();

class Client {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function signUp($nom, $email, $password, $adresse, $telephone) {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO client (nom, email, password, adresse, telephone) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$nom, $email, $password_hash, $adresse, $telephone]);
    }
   
    

    public function signIn($email, $password) {
        $sql = "SELECT * FROM client WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            
            $_SESSION['idClient'] = $user['idClient'];
            return true; 
        }
    
        return false; 
    }
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];
    $nom = $_POST["nom"] ?? null;
    $email = $_POST["email"] ?? null;
    $password = $_POST["password"] ?? null;
    $adresse = $_POST["adresse"] ?? null;
    $telephone = $_POST["telephone"] ?? null;
    $email_l = $_POST["email_l"] ?? null;
    $password_l = $_POST["password_l"] ?? null;

    $db = (new Database())->getConnection();

    if ($action === "signup" && isset($nom, $email, $password, $adresse, $telephone)) {
        $dd = new Client($db); 
        if ($dd->signUp($nom, $email, $password, $adresse, $telephone)) {
            echo "Sign-up successful!";
        } else {
            echo "Sign-up failed.";
        }
    }

    if ($action === "signin" && isset($email_l, $password_l)) {
        $bb = new Client($db);
        if ($bb->signIn($email_l, $password_l)) {
            header("Location: ../classes/Client.php"); 
         
        } else {
            echo "Sign-in failed. Please check your credentials.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Listing - Drive & Loc</title>
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
                <a href="../index.php" class="text-lg font-bold text-custom">Drive & Loc</a>
            </div>
            <ul class="hidden md:flex space-x-6 text-gray-800">
                <li><a href="./home.html" class="text-black hover:text-custom">Home</a></li>
                <li><a href="details.php" class="text-black hover:text-custom">Details</a></li>
                <li><a href="cars.php" class="text-black hover:text-custom">Cars</a></li>
                <li><a href="./Contrats/contrats.php" class="text-black hover:text-custom">Contrats</a></li>
            </ul>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="hero bg-cover bg-center py-20" style="background-image: url('../img/car-background.png');">
        <div class="container mx-auto pl-10">
            <h1 class="text-4xl font-bold text-white mb-4">Your Next Adventure <br><span class="text-custom">Starts Here</span></h1>
            <p class="text-lg text-white mb-6">Rent Your <span class="text-custom font-bold">Dream Car</span> Today!</p>
        </div>
    </section>

    <!-- Search and Filters -->
    <section class="bg-gray-50 py-8">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                <input type="text" placeholder="Search by model or category" class="w-full md:w-2/3 px-4 py-2 border rounded-lg">
                <button class="px-6 py-2 bg-custom text-white rounded-lg hover:bg-gray-700">Search</button>
            </div>
        </div>
    </section>

    <!-- Vehicle Listing as Table -->
    <section class="py-16 bg-white">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-custom mb-8 text-center">Our Cars</h2>
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-center">
                    <th class="py-2 px-4 border-b border-gray-300 text-center">#</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-center">Model</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-center">Disponibility</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-center">Price/Day</th>
                    <th class="py-2 px-4 border-b border-gray-300 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($vehicles)): ?>
                    <?php foreach ($vehicles as $vehicle): ?>
                        <tr class="text-center">
                            <td class="py-2 px-4 border-b border-gray-300">#<?= htmlspecialchars($vehicle['idVehicule']) ?></td>
                            <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($vehicle['modele']) ?></td>
                            <td class="py-2 px-4 border-b border-gray-300"><?= htmlspecialchars($vehicle['disponibilite']) ?></td>
                            <td class="py-2 px-4 border-b border-gray-300">$<?= htmlspecialchars($vehicle['prixParJour']) ?></td>
                            <td class="py-2 px-4 border-b border-gray-300">
                                <a href="../reservation.php" class="px-4 py-2 bg-custom text-white rounded hover:bg-gray-700">Book Now</a>
                                <a href="../details.php?id=<?= htmlspecialchars($vehicle['idVehicule']) ?>" class="px-4 py-2 bg-custom text-white rounded hover:bg-gray-700">Details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="py-2 px-4 text-center">No vehicles available at the moment.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
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