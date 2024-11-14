<?php
include '../includes/auth.php';
include '../db/database.php';

if (!isAdmin()) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->query("SELECT reports.id, users.username, reports.report_date, reports.description, reports.status FROM reports JOIN users ON reports.user_id = users.id");
$reports = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin - Laporan Pengaduan</title>
</head>
<body>
    <div class="container">
        <h2>Daftar Laporan Pengaduan</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Pengguna</th>
                <th>Tanggal Pengaduan</th>
                <th>Deskripsi</th>
                <th>Status</th>
            </tr>
            <?php foreach ($reports as $report): ?>
            <tr>
                <td><?php echo $report['id']; ?></td>
                <td><?php echo $report['username']; ?></td>
                <td><?php echo $report['report_date']; ?></td>
                <td><?php echo $report['description']; ?></td>
                <td><?php echo $report['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="../logout.php">Logout</a>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>