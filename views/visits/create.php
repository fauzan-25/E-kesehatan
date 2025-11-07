<?php
require_once '../../middleware/auth.php';
requireRole('bidan');
require_once '../../config/db.php';
require_once '../../models/Patient.php';
$patientModel = new Patient($pdo);
$patients = $patientModel->getAll();
?>
<form method="POST" action="../../controllers/VisitController.php">
    <h2>Tambah Kunjungan</h2>
    <label>Pasien:</label>
    <select name="patient_id" required>
        <option value="">-- Pilih Pasien --</option>
        <?php foreach ($patients as $p): ?>
            <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['name']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Tanggal:</label>
    <input type="date" name="visit_date" required><br>
    <label>Berat (kg):</label>
    <input type="number" step="0.1" name="weight"><br>
    <label>Tekanan Darah:</label>
    <input type="text" name="blood_pressure"><br>
    <label>Catatan:</label>
    <textarea name="notes"></textarea><br>

    <button type="submit" name="create">Simpan</button>
</form>
<a href="index.php">Kembali</a>
