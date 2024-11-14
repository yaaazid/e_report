<?php
include '../includes/auth.php';
include '../db/database.php';

if (!isUser ()) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM reports WHERE user_id = :user_id");
$stmt->execute(['user_id' => $user_id]);
$my_reports = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Laporan Saya</title>
</head>
<body>
    <div class="container">
        <h2>Laporan Saya</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Tanggal Pengaduan</th>
                <th>Deskripsi</th>
                <th>Status</th>
            </tr>
            <?php foreach ($my_reports as $report): ?>
            <tr>
                <td><?php echo $report['id']; ?></td>
                <td><?php echo $report['report_date']; ?></td>
                <td><?php echo $report['description']; ?></td>
                <td><?php echo $report['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="../logout.php">Logout</a>
    </div>
</body>
</html>