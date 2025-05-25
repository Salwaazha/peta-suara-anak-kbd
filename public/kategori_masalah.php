<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['jenis_masalah'] = $_POST['jenis_masalah'];
    header("Location: spesifikasi_masalah.php");
    exit();
}
?>

<form method="POST" action="">
    <h2>Kategori Masalah</h2>
    <label for="jenis_masalah">Pilih Jenis Masalah:</label><br><br>
    <select name="jenis_masalah" id="jenis_masalah" required>
        <option value="">-- Pilih Kategori Masalah --</option>
        <option value="Bullying">Bullying</option>
        <option value="Kekerasan">Kekerasan</option>
        <option value="Eksploitasi">Eksploitasi</option>
        <option value="Pernikahan Dini">Pernikahan Dini</option>
        <option value="Putus Sekolah">Putus Sekolah</option>
        <option value="Diskriminasi">Diskriminasi</option>
        <option value="Penelantaran">Penelantaran</option>
        <option value="Akses Pendidikan">Akses Pendidikan</option>
        <option value="Gangguan Mental">Gangguan Mental</option>
        <option value="Gangguan Perkembangan">Gangguan Perkembangan</option>
        <option value="Dampak Anak Broken Home">Dampak Anak Broken Home</option>
        <option value="Melihat Kejadian">Melihat Kejadian</option>
        <option value="Gangguan Gizi">Gangguan Gizi</option>
        <option value="Lainnya">Lainnya</option>
    </select>
    <br><br>
    <button type="submit">Lanjut</button>
</form>


