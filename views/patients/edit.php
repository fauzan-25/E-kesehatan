<?php
require_once '../../config/db.php';
require_once '../../models/Patient.php';
$patientModel = new Patient($pdo);
$patient = $patientModel->getById($_GET['id']);
?>
<form method="POST" action="../../controllers/PatientController.php">
    <h2>Edit Pasien</h2>
    <input type="hidden" name="id" value="<?= $patient['id'] ?>">
    <input type="text" name="name" value="<?= htmlspecialchars($patient['name']) ?>" required><br>
    <input type="text" name="nik" value="<?= htmlspecialchars($patient['nik']) ?>" required><br>
    <input type="number" name="age" value="<?= $patient['age'] ?>" required><br>
    <textarea name="address" required><?= htmlspecialchars($patient['address']) ?></textarea><br>
    <input type="text" name="phone" value="<?= htmlspecialchars($patient['phone']) ?>"><br>
    <button type="submit" name="update">Perbarui</button>
</form>
<a href="index.php">Kembali</a>
