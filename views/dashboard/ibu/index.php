<?php
require_once '../../../middleware/auth.php';
requireRole('ibu');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Ibu</title>
</head>
<body>
    <h1>Halo, <?= htmlspecialchars($_SESSION['user']['name']); ?> 👩‍🍼</h1>
    <p>Selamat datang di aplikasi E-Kesehatan Ibu & Anak.</p>

    <nav>
        <ul>
            <li><a href="articles.php">📰 Baca Artikel Edukasi</a></li>
            <li><a href="../../../controllers/AuthController.php?logout=true">Logout</a></li>
        </ul>
    </nav>
</body>
</html>
