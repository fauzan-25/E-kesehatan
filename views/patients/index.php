<?php
require_once '../../middleware/auth.php';
requireRole('bidan');
require_once '../../config/db.php';
require_once '../../models/Patient.php';
require_once '../../middleware/flash.php';
$patientModel = new Patient($pdo);
$patients = $patientModel->getAll();
showFlash();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pasien</title>
</head>
<body>
<h2>Data Pasien</h2>
<a href="create.php">+ Tambah Pasien</a>
<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>ID</th><th>Nama</th><th>NIK</th><th>Umur</th><th>Alamat</th><th>Telepon</th><th>Aksi</th>
    </tr>
    <?php foreach ($patients as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= htmlspecialchars($p['name']) ?></td>
        <td><?= htmlspecialchars($p['nik']) ?></td>
        <td><?= $p['age'] ?></td>
        <td><?= htmlspecialchars($p['address']) ?></td>
        <td><?= htmlspecialchars($p['phone']) ?></td>
        <td>
            <a href="edit.php?id=<?= $p['id'] ?>">Edit</a> |
            <a href="../../controllers/PatientController.php?delete=<?= $p['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
