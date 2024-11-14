<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"> 
    <title>Pengaduan - Beranda</title>
</head>
<body>
    <?php include 'includes/header.php'; ?> 

    <div class="container">
        <h2>Selamat Datang di Sistem Pengaduan</h2>
        <p>Ini adalah platform untuk mengajukan pengaduan dan mendapatkan solusi atas masalah yang Anda hadapi.</p>
        
        <h3>Fitur Kami:</h3>
        <ul>
            <li>Ajukan pengaduan dengan mudah.</li>
            <li>Melihat status pengaduan Anda.</li>
            <li>Admin dapat mengelola pengaduan yang masuk.</li>
        </ul>

        <h3>Mulai Sekarang:</h3>
        <p>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="pages/login.php">Login</a> atau <a href="pages/register.php">Daftar</a> untuk memulai.
            <?php else: ?>
                <a href="pages/user.php">Ajukan Pengaduan</a>
            <?php endif; ?>
        </p>
    </div>

    <?php include 'includes/footer.php'; ?> 
</body>
</html>