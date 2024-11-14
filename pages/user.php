<?php
include '../includes/auth.php';
include '../db/database.php';

if (!isUser ()) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];
    $stmt = $pdo->prepare("INSERT INTO reports (user_id, description) VALUES (:user_id, :description)");
    $stmt->execute(['user_id' => $user_id, 'description' => $description]);
    $success = "Pengaduan berhasil diajukan!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>User - Ajukan Pengaduan</title>
</head>
<body>
    <div class="container">
        <h2>Ajukan Pengaduan</h2>
        <?php if (isset($success)) echo "<p class='success'>$success</p>"; ?>
        <form method="POST">
            <textarea name="description" placeholder="Deskripsi Pengaduan" required></textarea>
            <button type="submit">Kirim Pengaduan</button>
        </form>
        <a href="../logout.php">Logout</a>
    </div>
    <?php include '../includes/footer.php'; ?> 
</body>
</html>