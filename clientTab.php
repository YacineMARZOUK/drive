    <?php
    session_start();

    if (isset($_SESSION['idClient'])) {
        $idClient = $_SESSION['idClient'];
    } else {
        echo "User not signed in.";
        exit;
    }

    require_once "<classes/Database.php";
    require_once "classes/reservation.php";

    $database = new Database();
    $pdo = $database->getConnection();
    require_once "classes/avis.php";
    $avisObj = new Avis($pdo);
    $avisList = $avisObj->getAvisByClient($idClient);

    // Fetch the reservations for the client
    $reservations = Reservation::afficherReservationsClient($pdo, $idClient);
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
        $idReservation = $_POST['idReservation'];

        // Appel de la fonction de suppression
        $result = Reservation::deleteReservation($pdo, $idReservation);

        if ($result === 202) {
            header('Location: clientTab.php');
            exit;
        } else {
            echo "<p class='text-red-500 text-center'>Error: Unable to delete the reservation.</p>";
        }
    }

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

        <!-- Client Reservations Table -->
        <section class="py-16 bg-white">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-custom mb-8 text-center">Your Reservations</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-lg font-semibold text-gray-700 border-b">Vehicle</th>
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
                    <td class="px-4 py-2 text-gray-800 border-b"><?= $reservation['idVehicule'] ?></td>
                    <td class="px-4 py-2 text-gray-800 border-b"><?= $reservation['dateDebut'] ?></td>
                    <td class="px-4 py-2 text-gray-800 border-b"><?= $reservation['dateFin'] ?></td>
                    <td class="px-4 py-2 text-gray-800 border-b"><?= $reservation['lieuPriseEnCharge'] ?></td>
                    <td class="px-4 py-2 text-gray-800 border-b"><?= ucfirst($reservation['statutReservation']) ?></td>
                    <td class="px-4 py-2 text-center border-b">
                        <form action="clientTab.php" method="POST">
                        <td class="px-4 py-2 text-center border-b">
    <form action="clientTab.php" method="POST" class="inline-block">
        <input type="hidden" name="idReservation" value="<?= $reservation['idReservation'] ?>">
        <button type="submit" name="delete" class="bg-custom text-white px-3 py-1 rounded hover:bg-red-700">
            Delete
        </button>
    </form>
    <form action="review.php" method="GET" class="inline-block ml-2">
        <input type="hidden" name="idClient" value="<?= $idClient ?>">
        <input type="hidden" name="idVehicule" value="<?= $reservation['idVehicule'] ?>">
        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700">
            Add review
        </button>
    </form>
</td>

                            
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="px-4 py-2 text-gray-800 text-center border-b">No reservations found.</td>
            </tr>
        <?php endif; ?>
    </tbody>

                    </table>
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
