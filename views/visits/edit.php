<?php
require_once '../../middleware/auth.php';
requireRole('bidan');
require_once '../../config/db.php';
require_once '../../models/Visit.php';
require_once '../../models/Patient.php';

$visitModel = new Visit($pdo);
$patientModel = new Patient($pdo);
$visit = $visitModel->getById($_GET['id']);
$patients = $patientModel->getAll();
?>
<form method="POST" action="../../controllers/VisitController.php">
    <h2>Edit Kunjungan</h2>
    <input type="hidden" name="id" value="<?= $visit['id'] ?>">

    <label>Pasien:</label>
    <select name="patient_id" required>
        <?php foreach ($patients as $p): ?>
            <option value="<?= $p['id'] ?>" <?= $p['id'] == $visit['patient_id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($p['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Tanggal:</label>
    <input type="date" name="visit_date" value="<?= $visit['visit_date'] ?>" required><br>
    <label>Berat (kg):</label>
    <input type="number" step="0.1" name="weight" value="<?= $visit['weight'] ?>"><br>
    <label>Tekanan Darah:</label>
    <input type="text" name="blood_pressure" value="<?= htmlspecialchars($visit['blood_pressure']) ?>"><br>
    <label>Catatan:</label>
    <textarea name="notes"><?= htmlspecialchars($visit['notes']) ?></textarea><br>

    <button type="submit" name="update">Perbarui</button>
</form>
<a href="index.php">Kembali</a>
