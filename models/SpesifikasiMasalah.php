<?php
include_once __DIR__ . '/../config/db.php';

class SpesifikasiMasalah
{
    public static function simpan($jenis_spesifik, $deskripsi, $lampiran)
    {
        global $conn;
        #id_laporan dihapus karena di database gaada, bisa km tambah kl di database ada
        $query = "INSERT INTO spesifikasimasalah (jenis_spesifik, deskripsi_laporan, lampiran)
                VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $jenis_spesifik, $deskripsi, $lampiran);

        return $stmt->execute();
    }

}

?>
