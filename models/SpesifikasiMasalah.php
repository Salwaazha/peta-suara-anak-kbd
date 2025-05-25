<?php
include_once __DIR__ . '/../config/db.php';

class SpesifikasiMasalah
{
    public static function simpan($id_laporan, $jenis_spesifik, $deskripsi, $lampiran)
    {
        global $conn;

        $query = "INSERT INTO spesifikasimasalah (id_laporan, jenis_spesifik, deskripsi_laporan, lampiran)
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isss", $id_laporan, $jenis_spesifik, $deskripsi, $lampiran);

        return $stmt->execute();
    }

}

?>
