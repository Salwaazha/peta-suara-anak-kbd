<?php
include_once __DIR__ . '/../config/db.php';
include_once __DIR__ . '/../models/Anak.php';

// Ambil data wilayah dari database
$sql = "SELECT id_wilayah, provinsi, kabupaten_kota, kecamatan FROM wilayah";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<!-- HEADER + CSS -->
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar - Peta Suara Anak</title>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #ffebeb;
      color: #5d3b45;
    }
    .header-bar {
      background-color: #ffd5de;
      padding: 16px 26px;
      display: flex;
      align-items: center;
    }
    .header-bar img {
      height: 57px;
      margin-right: 14px;
    }
    .header-bar span {
      font-weight: 750;
      font-size: 22px;
      color: #5b1a27;
    }
    .container {
      max-width: 365px;
      margin: 42px auto;
      background-color: #ffe6e6;
      border-radius: 14px;
      padding: 26px 22px 32px 22px;
      box-shadow: 0 4px 12px rgba(93, 59, 69, 0.15);
      text-align: center;
    }
    .header {
      font-weight: 750;
      font-size: 30px;
      margin-bottom: 16px;
      letter-spacing: 1.5px;
    }
    .subheader {
      font-weight: 650;
      font-size: 20px;
      margin-bottom: 20px;
    }
    form input[type="text"],
    form input[type="password"],
    form input[type="date"],
    form select,
    form textarea {
      width: 100%;
      padding: 12px 16px;
      margin-bottom: 14px;
      border: 1px solid #ddd1d1;
      border-radius: 27px;
      font-size: 16px;
      color: #5d3b45;
      box-sizing: border-box;
      outline: none;
      font-weight: 550;
    }
    form input::placeholder,
    form textarea::placeholder {
      color: #b7a2a9;
    }
    form select {
      appearance: none;
      background: white url("data:image/svg+xml;utf8,<svg fill='gray' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>") no-repeat right 12px center;
      background-size: 18px 18px;
      cursor: pointer;
    }
    button {
      width: 100%;
      background-color: #b46c70;
      color: #fff;
      padding: 16px 0;
      border: none;
      border-radius: 27px;
      font-weight: 650;
      font-size: 18px;
      cursor: pointer;
      margin-top: 8px;
      letter-spacing: 1.2px;
    }
    button:hover {
      background-color: #9c5659;
    }
    .footer-note {
      font-size: 14px;
      color: #b46c70;
      margin-top: 8px;
    }
    .bantuan {
      font-size: 15px;
      color: #b46c70;
      margin-top: 16px;
      text-align: center;
      cursor: pointer;
    }
    .bantuan:hover {
      text-decoration: underline;
    }

    form label {
        display: block;
        text-align: left;
        margin-bottom: 6px;
        font-size: 13px;
        font-weight: 500;
        color: #5d3b45;
    }

  </style>
</head>

<!-- BODY -->
<body>
  <!-- Header -->
  <div class="header-bar">
    <img src="../assets/logo.png" alt="Logo Peta Suara Anak" />
    <span>PETA SUARA ANAK</span>
  </div>

  <!-- Form Container -->
  <div class="container">
    <div class="header">DAFTAR</div>
    <div>
      <img src="../assets/icon-identity.png" alt="Icon Biodata" width="80" style="margin-bottom: 16px;">
    </div>
    <div class="subheader">Masukan Biodata</div>

    <form method="POST" action="proses_register.php" autocomplete="off">
      <input type="text" name="nama_anak" placeholder="NAMA: Isi dengan nama lengkap" required />
      <input type="text" name="nik" id="nik" placeholder="NIK: Sesuai dengan Kartu Keluarga" maxlength="16" minlength="12" required />
      <select name="jenis_kelamin" required>
        <option value="" disabled selected>JENIS KELAMIN:</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
      <input type="text" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="if(this.value===''){this.type='text'}" required />
      <input type="text" name="alamat" placeholder="ALAMAT" required />
      <input type="password" name="password" placeholder="PASSWORD: Minimal 6 karakter" minlength="6" required />
      <button type="submit">DAFTARKAN</button>
    </form>

    <div class="footer-note">*Pastikan semua kolom terisi dengan benar</div>
    <div class="bantuan">Bantuan</div>
  </div>
</body>
</html>