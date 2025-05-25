<?php
include '../config/db.php';

$sql = "SELECT f.id_forum, f.nama_forum,
        CONCAT(w.kecamatan, ', ', w.kabupaten_kota, ', ', w.provinsi) AS nama_wilayah
        FROM forum f
        LEFT JOIN wilayah w ON f.id_wilayah = w.id_wilayah
        ORDER BY w.provinsi, f.nama_forum";

$result = $conn->query($sql);

if (!$result) {
    die("Query error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Daftar Forum Anak</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #ffd6e8;
      color: #5a0f20;
    }

    .header-container {
      background-color: #ffaec9;
      border-radius: 0 0 20px 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      padding: 10px 20px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: start;
      max-width: fit-content;
    }

    .logo {
      height: 50px;
      margin-right: 10px;
    }

    .header-container h1 {
      font-size: 20px;
      color: white;
      margin: 0;
    }

    h2 {
      text-align: center;
      margin: 30px 0 20px;
      color: #c7637d;
      text-shadow: 1px 1px 2px #ffaec9;
    }

    table {
      width: 90%;
      max-width: 700px;
      margin: 0 auto;
      border-collapse: collapse;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      background-color: #ffaec9;
      border-radius: 15px;
      overflow: hidden;
    }

    th, td {
      padding: 15px 20px;
      text-align: left;
    }

    th {
      background-color: #c7637d;
      color: white;
      font-size: 1.1rem;
    }

    tr:nth-child(even) {
      background-color: #ffd6e8;
    }

    tr:hover {
      background-color: #ffbbd1;
      cursor: default;
    }

    .back-link {
      text-align: center;
      margin: 30px 0;
    }

    .back-link a {
      color: #c7637d;
      font-weight: bold;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="header-container">
    <img src="../assets/logo.png" alt="Logo" class="logo" />
    <h1>PETA SUARA ANAK</h1>
  </div>

  <h2>Daftar Forum Anak</h2>

  <table>
    <thead>
      <tr>
        <th>Nama Forum</th>
        <th>Wilayah</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()) : ?>
        <tr>
          <td><?= htmlspecialchars($row['nama_forum']) ?></td>
          <td><?= htmlspecialchars($row['nama_wilayah'] ?? '-') ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>

  <div class="back-link">
    <a href="index.php">&larr; Kembali ke Beranda</a>
  </div>

</body>
</html>
