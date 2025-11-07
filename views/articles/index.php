<?php
require_once '../../middleware/auth.php';
requireRole('bidan');
require_once '../../config/db.php';
require_once '../../models/Article.php';
require_once '../../middleware/flash.php';

$articleModel = new Article($pdo);
$articles = $articleModel->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Artikel Edukasi</title>
    <style>
        img.thumb {
            width: 100px;
            height: auto;
            border-radius: 6px;
        }
        table { border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 6px 10px; border: 1px solid #ccc; text-align: left; }
    </style>
</head>
<body>
<h2>Daftar Artikel Edukasi</h2>

<?php showFlash(); ?>

<a href="create.php">+ Tambah Artikel</a> | 
<a href="../dashboard/admin/index.php">Kembali ke Dashboard</a>

<table>
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Gambar</th>
        <th>Penulis</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($articles as $a): ?>
    <tr>
        <td><?= $a['id'] ?></td>
        <td><?= htmlspecialchars($a['title']) ?></td>
        <td>
            <?php if (!empty($a['image'])): ?>
                <img src="../../../public/uploads/articles/<?= htmlspecialchars($a['image']) ?>" class="thumb" alt="gambar">
            <?php else: ?>
                <em>Tidak ada</em>
            <?php endif; ?>
        </td>
        <td><?= htmlspecialchars($a['author_name']) ?></td>
        <td><?= date('d M Y', strtotime($a['created_at'])) ?></td>
        <td>
            <a href="edit.php?id=<?= $a['id'] ?>">Edit</a> |
            <a href="../../controllers/ArticleController.php?delete=<?= $a['id'] ?>" onclick="return confirm('Hapus artikel ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
