<?php include '../config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Laporan Masalah</title>
</head>
<body>
    <h2>Daftar Laporan Masalah</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>NIK Anak</th>
            <th>Wilayah</th>
            <th>Kategori</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Deskripsi</th>
        </tr>

        <?php
        $sql = "SELECT * FROM LAPORAN_MASALAH";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id_laporan']}</td>
                    <td>{$row['NIK']}</td>
                    <td>{$row['id_wilayah']}</td>
                    <td>{$row['kode_kategori']}</td>
                    <td>{$row['tanggal_laporan']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['deskripsi_laporan']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
