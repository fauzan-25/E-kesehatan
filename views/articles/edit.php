<?php
require_once '../../middleware/auth.php';
requireRole('bidan');
require_once '../../config/db.php';
require_once '../../models/Article.php';

$articleModel = new Article($pdo);
$article = $articleModel->getById($_GET['id']);
?>
<form method="POST" action="../../controllers/ArticleController.php" enctype="multipart/form-data">
    <h2>Edit Artikel</h2>
    <input type="hidden" name="id" value="<?= $article['id'] ?>">
    <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>" required><br>
    <textarea name="content" rows="6" required><?= htmlspecialchars($article['content']) ?></textarea><br>
    <label>Upload Gambar Baru (opsional):</label>
    <input type="file" name="image" accept="image/*"><br>
    <button type="submit" name="update">Perbarui</button>
</form>
<a href="index.php">Kembali</a>
