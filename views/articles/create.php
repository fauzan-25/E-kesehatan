<?php
require_once '../../middleware/auth.php';
requireRole('bidan');
?>
<form method="POST" action="../../controllers/ArticleController.php" enctype="multipart/form-data">
    <h2>Tambah Artikel</h2>
    <input type="text" name="title" placeholder="Judul Artikel" required><br>
    <textarea name="content" placeholder="Isi artikel..." rows="6" required></textarea><br>
    <label>Upload Gambar:</label>
    <input type="file" name="image" accept="image/*"><br>
    <button type="submit" name="create">Simpan</button>
</form>
<a href="index.php">Kembali</a>
