<?php
// karena file ini ada di: app/views/dashboard/admin/
// maka naik ke folder middleware di: app/middleware/auth.php
require_once '../../../middleware/auth.php';
requireRole('bidan');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Bidan</title>
</head>
<body>
    <h1>Selamat datang, Bidan <?= htmlspecialchars($_SESSION['user']['name']); ?>!</h1>

    <nav>
        <ul>
            <li><a href="../../patients/index.php">👩‍🍼 Kelola Data Pasien</a></li>
            <li><a href="../../visits/index.php">📋 Catatan Kunjungan</a></li>
            <li><a href="../../articles/index.php">📰 Artikel Edukasi</a></li>
        </ul>
    </nav>

    <a href="../../../controllers/AuthController.php?logout=true">Logout</a>
</body>
</html>
