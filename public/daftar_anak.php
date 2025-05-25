<?php
include '../config/db.php';

if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tanggal_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO ANAK (NIK, nama_anak, tanggal_lahir, jenis_kelamin, alamat, password) 
            VALUES ('$nik', '$nama', '$tgl_lahir', '$jk', '$alamat', '$password')";

    if ($conn->query($sql)) {
        echo "✅ Registrasi berhasil! Silakan <a href='login_anak.php'>login</a>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>

<form method="POST">
    <h2>Form Registrasi Anak</h2>
    NIK: <input type="text" name="nik" required><br>
    Nama: <input type="text" name="nama" required><br>
    Tanggal Lahir: <input type="date" name="tanggal_lahir" required><br>
    Jenis Kelamin: 
    <select name="jenis_kelamin"><option value="L">L</option><option value="P">P</option></select><br>
    Alamat: <input type="text" name="alamat" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" name="daftar" value="Daftar">
</form>
