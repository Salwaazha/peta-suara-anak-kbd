<?php
require_once '../models/Anak.php';
require_once '../config/db.php'; // ini cukup, tidak perlu koneksi.php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_POST['nik'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (!empty($nik) && !empty($password)) {
      $anak = Anak::getByNIK($nik);

        if ($anak) {
            $storedPassword = $anak['Password'];

            if (password_verify($password, $storedPassword) || $password == $storedPassword) {
                $_SESSION['nik'] = $anak['NIK'];
                $_SESSION['nama_anak'] = $anak['Nama_Anak'];
                header('Location: ajukan_laporan.php');
                exit;
            } else {
                $error = 'Password salah.';
            }
        } else {
            $error = 'NIK tidak ditemukan.';
        }
    } else {
        $error = 'Mohon isi semua field.';
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Anak</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #ffd4e0;
      font-family: 'Poppins', sans-serif;
    }

    .header {
      display: flex;
      align-items: center;
      padding: 15px 30px;
      background-color: #ffb6c1;
    }

    .header img {
      height: 65px;
      margin-right: 20px;
    }

    .header span {
      font-size: 25px;
      font-weight: bold;
      color: #7c2135;
    }

    .container {
      max-width: 500px;
      background-color: #ffc4d4;
      margin: 60px auto;
      border-radius: 20px;
      padding: 45px 40px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      text-align: center;
    }

    .container img {
      width: 100px;
      margin-bottom: 20px;
    }

    h2 {
      color: #7c2135;
      margin-bottom: 8px;
      font-size: 25px;
    }

    p {
      font-size: 20px;
      color: #5a1a28;
      margin-bottom: 25px;
    }

    input[type="text"], input[type="password"] {
      width: 75%;
      padding: 14px;
      margin: 10px 0;
      border: none;
      border-radius: 20px;
      background-color: #ffe3ed;
      font-size: 18px;
      text-align: center;
    }

    .btn {
      background-color: #7c2135;
      color: white;
      padding: 12px 28px;
      border: none;
      border-radius: 20px;
      font-size: 18px;
      cursor: pointer;
      margin-top: 20px;
    }

    .btn:hover {
      background-color: #661a2a;
    }

    .bantuan {
      display: inline-block;
      background-color: #8a4c5f;
      color: white;
      padding: 10px 24px;
      border-radius: 20px;
      font-size: 17px;
      margin-top: 10px;
      text-decoration: none;
    }

    .footer {
      margin-top: 18px;
      font-size: 13px;
      color: #8a4c5f;
    }

    .footer a {
      color: #8a4c5f;
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="header">
  <img src="../assets/logo.png" alt="Logo">
  <span>Peta Suara Anak</span>
</div>

<div class="container">
  <img src="../assets/profile-icon.png" alt="User Icon">
  <h2>MASUK / LOGIN</h2>
  <p>Pastikan Nama dan NIK yang kamu masukkan sesuai dengan biodata yang didaftarkan sebelumnya</p>

  <form method="post">
    <input type="text" name="nama_anak" placeholder="Nama" required>
    <input type="text" name="nik" placeholder="NIK" required>
    <input type="password" name="password" placeholder="Kata Sandi" required>
    <button type="submit" class="btn">Masuk</button>
  </form>

  <a href="bantuan.php" class="bantuan">Bantuan</a>

  <div class="footer">
    Belum punya akun? <a href="register.php">Daftar di sini</a><br>
    © 2025 Peta Suara Anak
  </div>
</div>

</body>
</html>
