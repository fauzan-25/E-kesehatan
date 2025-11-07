<?php
require_once '../../../middleware/auth.php';
requireRole('ibu');
require_once '../../../config/db.php';
require_once '../../../models/Article.php';

$articleModel = new Article($pdo);
$articles = $articleModel->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Artikel Edukasi</title>
<style>
body { font-family: Arial; background:#f7f8fa; padding:20px; }
.article { background:#fff; border-radius:10px; margin:15px 0; padding:20px; box-shadow:0 2px 5px rgba(0,0,0,0.1);}
.article img { max-width:100%; border-radius:8px; margin-bottom:10px; }
.btn-toggle { background:#3cd3ad; color:white; border:none; padding:6px 10px; border-radius:5px; cursor:pointer; }
.btn-toggle:hover { opacity:0.8; }
</style>
</head>
<body>
<h1>Artikel Edukasi Ibu & Anak</h1>
<a href="index.php">⬅ Kembali</a>
<hr>

<?php foreach ($articles as $a): ?>
<div class="article">
    <?php if (!empty($a['image'])): ?>
        <img src="../../../../public/uploads/articles/<?= htmlspecialchars($a['image']); ?>" alt="Gambar artikel">
    <?php endif; ?>
    <h2><?= htmlspecialchars($a['title']); ?></h2>
    <small>Oleh <?= htmlspecialchars($a['author_name']); ?> • <?= date('d M Y', strtotime($a['created_at'])); ?></small>
    <p class="preview"><?= nl2br(htmlspecialchars(substr($a['content'], 0, 150))) ?>...</p>
    <p class="full" style="display:none;"><?= nl2br(htmlspecialchars($a['content'])); ?></p>
    <button class="btn-toggle">Lihat Selengkapnya</button>
</div>
<?php endforeach; ?>

<script>
// DOM + Event: tombol lihat selengkapnya
document.querySelectorAll('.btn-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
        const article = btn.closest('.article');
        const preview = article.querySelector('.preview');
        const full = article.querySelector('.full');

        const expanded = full.style.display === 'block';
        full.style.display = expanded ? 'none' : 'block';
        preview.style.display = expanded ? 'block' : 'none';
        btn.textContent = expanded ? 'Lihat Selengkapnya' : 'Sembunyikan';
    });
});
</script>
</body>
</html>
