<?php
session_start();

if (isset($_SESSION['idClient'])) {
    $idClient = $_SESSION['idClient'];
   
} else {
    echo "User not signed in.";
}
require_once "Database.php";
class reservation{

    private $id;
    private $idClient;
    private $idVehicule;
    private $fullname;
    private $email;
    private $selectVehicle;
    private $startDate;
    private $endDate;
    private $lieuPriseEnCharge;
    private $statutReservation;


    public function __construct($idClient ,$idVehicule,$dateDebut,$dateFin,$lieuPriseEnCharge,$statutReservation){
        $this->idClient= $idClient ;
        $this->idVehicule=$idVehicule;
        $this->dateDebut=$dateDebut;
        $this->dateFin=$dateFin;
        $this->lieuPriseEnCharge=$lieuPriseEnCharge;
        $this->statutReservation=$statutReservation;

    }

    public function createReservation($pdo){
        try {
            $stmt=$pdo->prepare("INSERT INTO reservation (idClient,idVehicule,dateDebut,dateFin,lieuPriseEnCharge,statutReservation) VALUES (?,?,?,?,?,?)");
            $stmt->execute([$this->idClient,$this->idVehicule, $this->dateDebut, $this->dateFin,$this->lieuPriseEnCharge, $this->statutReservation]);
            return 202;
        } catch (Exception $e ) {
            return 404;
        
        }
    }

  

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data
    $vehicle = $_POST['vehicle'];
    $startDate = $_POST['date-start'];
    $endDate = $_POST['date-end'];
    $pickupLocation = $_POST['pickup-location'];

    // Assuming you have the vehicle ID stored somewhere (you can modify it based on your database structure)
    $idVehicule = 1; // This is a placeholder; replace it with the correct ID based on the vehicle selected.

    // Create a new reservation object
    $reservation = new reservation(null, $idClient, $idVehicule, $startDate, $endDate, $pickupLocation, 'Pending');

    // Insert reservation into the database
    $result = $reservation->createReservation($idClient, $idVehicule, $startDate, $endDate, $pickupLocation, 'Pending');

    if ($result === 202) {
        echo "Reservation successful!";
    } else {
        echo "Error occurred while making the reservation.";
    }
}
?>