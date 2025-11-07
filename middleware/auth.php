<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../../views/auth/login.php');
    exit;
}

// proteksi halaman berdasarkan role (opsional)
function requireRole($role) {
    if ($_SESSION['user']['role'] !== $role) {
        header('Location: ../../auth/login.php');
        exit;
    }
}
?>
