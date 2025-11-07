<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/Visit.php';
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../middleware/auth.php';
requireRole('bidan');

$visitModel = new Visit($pdo);

// CREATE
if (isset($_POST['create'])) {
    $visitModel->create($_POST['patient_id'], $_POST['visit_date'], $_POST['weight'], $_POST['blood_pressure'], $_POST['notes']);
    header('Location: ../views/visits/index.php?success=1');
    exit;
}

// UPDATE
if (isset($_POST['update'])) {
    $visitModel->update($_POST['id'], $_POST['patient_id'], $_POST['visit_date'], $_POST['weight'], $_POST['blood_pressure'], $_POST['notes']);
    header('Location: ../views/visits/index.php?updated=1');
    exit;
}

// DELETE
if (isset($_GET['delete'])) {
    $visitModel->delete($_GET['delete']);
    header('Location: ../views/visits/index.php?deleted=1');
    exit;
}
?>
