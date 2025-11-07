<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/Article.php';
require_once __DIR__ . '/../middleware/auth.php';
requireRole('bidan'); // hanya bidan yang bisa kelola artikel

$articleModel = new Article($pdo);

// CREATE
if (isset($_POST['create'])) {
    $imageName = null;

    if (!empty($_FILES['image']['name'])) {
        $uploadDir = __DIR__ . '/../../public/uploads/articles/';
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $imageName;

        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (in_array($_FILES['image']['type'], $allowedTypes) && $_FILES['image']['size'] < 2 * 1024 * 1024) {
            move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
        } else {
            $imageName = null; // kalau gagal validasi
        }
    }

    $articleModel->create($_POST['title'], $_POST['content'], $_SESSION['user']['id'], $imageName);
    header('Location: ../views/articles/index.php?success=1');
    exit;
}

if (isset($_POST['update'])) {
    $imageName = null;
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = __DIR__ . '/../../public/uploads/articles/';
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName);
    }

    $articleModel->update($_POST['id'], $_POST['title'], $_POST['content'], $imageName);
    header('Location: ../views/articles/index.php?updated=1');
    exit;
}

// DELETE
if (isset($_GET['delete'])) {
    $articleModel->delete($_GET['delete']);
    header('Location: ../views/articles/index.php?deleted=1');
    exit;
}
?>
