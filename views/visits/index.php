<?php
require_once '../../middleware/auth.php';
requireRole('bidan');
require_once '../../config/db.php';
require_once '../../models/Visit.php';
$visitModel = new Visit($pdo);
$visits = $visitModel->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kunjungan</title>
</head>
<body>
<h2>Daftar Kunjungan Pasien</h2>
<a href="create.php">+ Tambah Kunjungan</a> | <a href="../dashboard/admin/index.php">Kembali ke Dashboard</a>

<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama Pasien</th>
        <th>Tanggal</th>
        <th>Berat (kg)</th>
        <th>Tekanan Darah</th>
        <th>Catatan</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($visits as $v): ?>
    <tr>
        <td><?= $v['id'] ?></td>
        <td><?= htmlspecialchars($v['patient_name']) ?></td>
        <td><?= $v['visit_date'] ?></td>
        <td><?= $v['weight'] ?></td>
        <td><?= htmlspecialchars($v['blood_pressure']) ?></td>
        <td><?= htmlspecialchars($v['notes']) ?></td>
        <td>
            <a href="edit.php?id=<?= $v['id'] ?>">Edit</a> |
            <a href="../../controllers/VisitController.php?delete=<?= $v['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
