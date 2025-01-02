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
}
?>