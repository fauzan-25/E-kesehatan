<?php
class Visit {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $sql = "SELECT v.*, p.name AS patient_name 
                FROM visits v
                JOIN patients p ON v.patient_id = p.id
                ORDER BY v.visit_date DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM visits WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($patient_id, $visit_date, $weight, $blood_pressure, $notes) {
        $stmt = $this->pdo->prepare("INSERT INTO visits (patient_id, visit_date, weight, blood_pressure, notes)
                                     VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$patient_id, $visit_date, $weight, $blood_pressure, $notes]);
    }

    public function update($id, $patient_id, $visit_date, $weight, $blood_pressure, $notes) {
        $stmt = $this->pdo->prepare("UPDATE visits SET patient_id=?, visit_date=?, weight=?, blood_pressure=?, notes=? WHERE id=?");
        return $stmt->execute([$patient_id, $visit_date, $weight, $blood_pressure, $notes, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM visits WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
