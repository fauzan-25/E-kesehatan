<?php
session_start();
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../config/db.php';

$userModel = new User($pdo);

// === REGISTER ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'] ?? 'ibu';

    if ($userModel->register($name, $email, $password, $role)) {
        // arahkan ke halaman login setelah register
        header('Location: ../views/auth/login.php?success=1');
        exit;
    } else {
        header('Location: ../views/auth/register.php?error=1');
        exit;
    }
}

// === LOGIN ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    if ($userModel->login($email, $password, $remember)) {
        $role = $_SESSION['user']['role'];
        if ($role === 'bidan') {
            header('Location: ../views/dashboard/admin/index.php');
        } else {
            header('Location: ../views/dashboard/ibu/index.php');
        }
        exit;
    } else {
        // kirim kembali ke halaman login dengan pesan error
        header('Location: ../views/auth/login.php?error=1');
        exit;
    }
}

// === LOGOUT ===
if (isset($_GET['logout'])) {
    $userModel->logout();
    header('Location: ../views/auth/login.php');
    exit;
}
?>
