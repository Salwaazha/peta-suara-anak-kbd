<?php
header('Content-Type: application/json');
include '../config/db.php';  // Pastikan path ini benar

$sql = "SELECT k.jenis_masalah, COUNT(l.id_laporan) as jumlah
        FROM kategorimasalah k
        LEFT JOIN laporan_masalah l ON k.kode_kategori = l.kode_kategori
        GROUP BY k.kode_kategori";

$result = $conn->query($sql);

$data = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        // Pastikan jumlah sebagai integer string juga tidak masalah
        $data[] = [
            'jenis_masalah' => $row['jenis_masalah'],
            'jumlah' => $row['jumlah']
        ];
    }
    echo json_encode($data);
} else {
    // Jika query error, kembalikan error message JSON
    echo json_encode(['error' => $conn->error]);
}
?>
