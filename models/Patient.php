<?php
class Patient {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM patients ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM patients WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $nik, $age, $address, $phone) {
        $stmt = $this->pdo->prepare("INSERT INTO patients (name, nik, age, address, phone) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $nik, $age, $address, $phone]);
    }

    public function update($id, $name, $nik, $age, $address, $phone) {
        $stmt = $this->pdo->prepare("UPDATE patients SET name=?, nik=?, age=?, address=?, phone=? WHERE id=?");
        return $stmt->execute([$name, $nik, $age, $address, $phone, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM patients WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
