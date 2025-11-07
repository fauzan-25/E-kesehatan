<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../middleware/auth.php';
require_once __DIR__ . '/../middleware/flash.php';
requireRole('bidan'); // hanya bidan yang boleh kelola pasien

$patientModel = new Patient($pdo);

// CREATE
if (isset($_POST['create'])) {
   if ($patientModel->create($_POST['name'], $_POST['nik'], $_POST['age'], $_POST['address'], $_POST['phone'])) {
        setFlash('success', '✅ Data pasien berhasil ditambahkan.');
    } else {
        setFlash('error', '❌ Gagal menambahkan data pasien.');
    }
    header('Location: ../views/patients/index.php');
    exit;
}

// UPDATE
if (isset($_POST['update'])) {
    if ($patientModel->update($_POST['id'], $_POST['name'], $_POST['nik'], $_POST['age'], $_POST['address'], $_POST['phone'])) {
        setFlash('success', '✅ Data pasien berhasil diperbarui.');
    } else {
        setFlash('error', '❌ Gagal memperbarui data pasien.');
    }
    header('Location: ../views/patients/index.php');
    exit;
}

// DELETE
if (isset($_GET['delete'])) {
     if ($patientModel->delete($_GET['delete'])) {
        setFlash('success', '✅ Data pasien dihapus.');
    } else {
        setFlash('error', '❌ Gagal menghapus data pasien.');
    }
    header('Location: ../views/patients/index.php');
    exit;
}
?>
