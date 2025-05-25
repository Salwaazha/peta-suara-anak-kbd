<?php
class KategoriMasalah {
    public static function simpan($id_laporan, $jenis_masalah) {
        global $conn;

        $sql = "INSERT INTO kategorimasalah (id_laporan, jenis_masalah) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $id_laporan, $jenis_masalah);
        $stmt->execute();
    }
}
