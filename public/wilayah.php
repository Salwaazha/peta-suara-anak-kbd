<?php
session_start();
require_once '../config/db.php';
require_once '../models/Wilayah.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $provinsi = $_POST['provinsi'] ?? null;
    $kabupaten = $_POST['kabupaten_kota'] ?? null;
    $kecamatan = $_POST['kecamatan'] ?? null;

    if ($provinsi && $kabupaten && $kecamatan) {
        $id_wilayah = Wilayah::simpan($provinsi, $kabupaten, $kecamatan);

        $nik = $_SESSION['nik'] ?? '';
        if ($nik && $id_wilayah) {
            $query = "UPDATE anak SET id_wilayah = ? WHERE nik = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("is", $id_wilayah, $nik);
            $stmt->execute();
        }

        header("Location: proses_laporan.php");
        exit();
    } else {
        echo "Form tidak lengkap!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lokasi Kejadian</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <div class="header">
            <img src="../assets/logo.png" alt="Logo" class="logo">
            <div class="profile-icon">NP</div>
        </div>

        <img src="../assets/pin-map.png" alt="Pin Lokasi">
        <h2>DIMANA LOKASI KEJADIAN<br>BERLANGSUNG??</h2>
        <p>MASUKAN LOKASI WILAYAH KEJADIAN MASALAH YANG AKAN DILAPORKAN, MELIPUTI PROVINSI, KOTA, DAN KECAMATAN</p>

        <form method="POST" action="">
            <div class="input-wrapper">
                <input type="text" name="kecamatan" placeholder="KECAMATAN:" required>
            </div>
            <div class="input-wrapper">
                <input type="text" name="kabupaten_kota" placeholder="KOTA:" required>
            </div>
            <div class="input-wrapper">
                <input type="text" name="provinsi" placeholder="PROVINSI:" required>
            </div>
            <button type="submit" class="btn daftar" style="margin-top: 15px;">Kirim</button>
        </form>

        <div class="button-container">
            <a href="help.php" class="btn bantuan" style="margin-top: 0px;">Bantuan</a>
        </div>
    </div>
</body>
</html>

