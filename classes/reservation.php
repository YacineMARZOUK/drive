<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['idClient'])) {
    $idClient = $_SESSION['idClient'];
   
} else {
    echo "User not signed in.";
}
require_once "Database.php";
class Reservation {
    private $idClient;
    private $idVehicule;
    private $dateDebut;
    private $dateFin;
    private $lieuPriseEnCharge;
    private $statutReservation;

    public function __construct($idClient, $idVehicule, $dateDebut, $dateFin, $lieuPriseEnCharge, $statutReservation = 'pending') {
        $this->idClient = $idClient;
        $this->idVehicule = $idVehicule;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->lieuPriseEnCharge = $lieuPriseEnCharge;
        $this->statutReservation = $statutReservation;
    }

    public function createReservation($pdo) {
        try {
            $stmt = $pdo->prepare("INSERT INTO reservation (idClient, idVehicule, dateDebut, dateFin, lieuPriseEnCharge, statutReservation) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
            $this->idClient,
            $this->idVehicule,
            $this->dateDebut,
            $this->dateFin,
            $this->lieuPriseEnCharge,
            $this->statutReservation
            ]);

            return 202;
        } catch (Exception $e) {
            return 404;
        }
    }

    public static function afficherReservationsClient($pdo, $idClient) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM reservation WHERE idClient = ?");
            $stmt->execute([$idClient]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return 404;
        }
    }

    public static function deleteReservation($pdo, $id) {
        try {
            $stmt = $pdo->prepare("DELETE FROM reservation WHERE idReservation = ?");
            $stmt->execute([$id]);
            return 202;
        } catch (Exception $e) {
            return 404;
        }
    }
    public static function afficherAllReservation($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM reservation");
            $stmt->execute(); 
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return 404; 
        }
    }
    

}


$database = new Database();
$pdo = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $startDate = $_POST['date-start'];
    $endDate = $_POST['date-end'];
    $pickupLocation = $_POST['pickup-location'];
    $idVehicule = $_GET['id'];
    $reservation = new Reservation($idClient, $idVehicule, $startDate, $endDate, $pickupLocation, 'Pending');
    $result = $reservation->createReservation($pdo);
    if ($result === 202) {
        header('Location: ../clientTab.php');
        exit;
    } else {
        echo "Error occurred while making the reservation.";
    }
}
?>