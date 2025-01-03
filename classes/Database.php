<?php
class Database {
    public function getConnection() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=drive", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
?>
