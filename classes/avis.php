<?php
class avis {
    protected $idAvis;
    protected $idClient;
    protected $idVehicule;
    protected $commentaire;
    protected $note;
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function ajouterAvis($idClient, $idVehicule, $commentaire, $note) {
        $sql = "INSERT INTO avis (idClient, idVehicule, commentaire, note) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$idClient, $idVehicule, $commentaire, $note]); 
    }

    public function modifierAvis($idAvis, $commentaire, $note) {
        $sql = "UPDATE avis SET commentaire = ?, note = ? WHERE idAvis = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$commentaire, $note, $idAvis]);
    }

    public function supprimerAvis($idAvis) {
        $sql = "DELETE FROM avis WHERE idAvis = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$idAvis]);
    }

    public function getAvisByClient($idClient) {
        $sql = "SELECT * FROM avis WHERE idClient = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idClient]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllAvis() {
        $sql = "SELECT * FROM avis";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
