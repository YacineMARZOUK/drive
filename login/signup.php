<?php
session_start();
require_once '../classes/client.php';
require_once '../classes/Database.php';

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
            echo '<script>window.location.href = "login.php";</script>';
        } else {
            echo "Sign-up failed.";
        }
    }

    if ($action === "signin" && isset($email_l, $password_l)) {
        $bb = new Client($db);
        $idClient = $bb->signIn($email_l, $password_l); 
        
        if ($idClient) {
            $_SESSION['idClient'] = $idClient;
    
            $query = $db->prepare("SELECT idAdmin FROM admin WHERE idClient = :idClient");
            $query->bindParam(':idClient', $idClient, PDO::PARAM_INT);
            $query->execute();
            $isAdmin = $query->fetch(PDO::FETCH_ASSOC);
    
            if ($isAdmin) {
                $_SESSION['isAdmin'] = true;
                echo '<script>window.location.href = "../admin/allReservation.php";</script>';
                exit();
            } else {
                echo '<script>window.location.href = "../classes/client.php";</script>';
                exit();
            }
        } else {
            echo "Sign-in failed. Please check your credentials.";
        }
    }
}
?>
