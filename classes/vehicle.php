<?php
class Vehicle {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getVehicles() {
        $sql = "SELECT * FROM vehicule"; 
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVehicleById($id) {
        $sql = "SELECT * FROM vehicule WHERE idVehicule = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rechercheVehicle($categoryId) {
        $sql = "SELECT * FROM vehicule WHERE idCategorie = :categoryId";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['categoryId' => $categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>