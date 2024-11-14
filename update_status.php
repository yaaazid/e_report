<?php
include '../includes/auth.php';
include '../db/database.php';

if (!isAdmin()) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $report_id = $_POST['report_id'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE reports SET status = :status WHERE id = :id");
    $stmt->execute(['status' => $status, 'id' => $report_id]);

    header("Location: admin.php");
    exit;
}
?>
