<?php
session_start();
require_once '../models/LaporanMasalah.php';
require_once '../templates/header.php';

if (!isset($_SESSION['nik'])) {
    echo "Anda harus login terlebih dahulu.";
    exit;
}

$nik = $_SESSION['nik'];
$laporan = getLaporanByAnak($nik);
?>

<h2>Daftar Laporan Saya</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID Laporan</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Deskripsi</th>
    </tr>
    <?php while ($row = $laporan->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id_laporan'] ?></td>
            <td><?= $row['tanggal_laporan'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['deskripsi_laporan'] ?></td>
        </tr>
    <?php } ?>
</table>

<?php require_once '../templates/footer.php'; ?>
