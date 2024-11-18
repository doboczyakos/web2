<?php
class RestServer_Model {
    private $conn;
    private $table = "pilota";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Minden rekord lekérdezése
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Egy rekord lekérdezése az alapján
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE az = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Új rekord létrehozása
    public function create($data) {
        $query = "INSERT INTO " . $this->table . " (az, nev, nem, szuldat, nemzet) SELECT MAX( az ) + 1, ?, ?, ?, ? FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$data['nev'], $data['nem'], $data['szuldat'], $data['nemzet']]);
    }

    // Rekord frissítése
    public function update($id, $data) {
        $query = "UPDATE " . $this->table . " SET nev = ?, nem = ?, szuldat = ?, nemzet = ? WHERE az = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$data['nev'], $data['nem'], $data['szuldat'], $data['nemzet'], $id]);
    }

    // Rekord törlése
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE az = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}

?>