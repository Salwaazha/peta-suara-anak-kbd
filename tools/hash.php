<?php
include '../templates/header.php';
?>

<h2>Ajukan Laporan Masalah</h2>
<form action="../proses/proses_ajukan_laporan.php" method="post">
    <label>NIK Anak:</label>
    <input type="text" name="nik" required><br>

    <label>Wilayah (ID):</label>
    <input type="number" name="id_wilayah" required><br>

    <label>Judul Masalah:</label>
    <input type="text" name="judul" required><br>

    <label>Deskripsi:</label>
    <textarea name="deskripsi" required></textarea><br>

    <button type="submit">Kirim Laporan</button>
</form>

<?php
include '../templates/footer.php';
?>