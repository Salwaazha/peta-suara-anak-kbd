<?php
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['nik'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Anak</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="../assets/logo.png" alt="Logo" class="logo">
            <h1>Peta Suara Anak</h1>
        </div>

        <!-- Card Besar Pembungkus Konten -->
        <div class="main-card">
            <img src="../assets/dashboard_illustration.png" alt="Ilustrasi" class="illustration" style="margin-bottom: 0px;">

            <div class="text-box">
                <h2>JANGAN RAGU!! CERITAKAN MASALAHMU KEPADA KAMI,<br>KAMI SIAP MEMBANTU!! 🤗</h2>
                <p>Adukan Masalahmu dengan Jujur dan Terbuka.<br>
                Kami akan menjaga privasimu dan membantu untuk tindakan lebih lanjut.</p>

            <div class="button-row">
                <a href="ajukan_laporan.php" class="btn login">SELANJUTNYA</a>
                <a href="#" class="btn bantuan">Bantuan</a>
            </div>

            </div>
        </div>
    </div>
</body>
</html>

