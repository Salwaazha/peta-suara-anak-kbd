<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['tanggal_laporan'] = $_POST['tanggal_laporan'];
    header("Location: kategori_masalah.php");
    exit();
}
if (!isset($_SESSION['nik'])) {
    header("Location: login_anak.php"); // atau halaman login kamu
    exit;
}

?>

<form method="POST" action="">
    <h2>Ajukan Laporan</h2>
    <label for="tanggal_laporan">Tanggal Laporan:</label>
    <input type="date" name="tanggal_laporan" required>
    <br><br>
    <button type="submit">Lanjut</button>
</form>
