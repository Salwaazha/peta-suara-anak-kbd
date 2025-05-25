<?php
class LaporanMasalah {
    public static function buat($nik, $tanggal) {
        global $conn;

        $sql = "INSERT INTO laporanmasalah (nik, tanggal_laporan) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nik, $tanggal);
        $stmt->execute();

        return $conn->insert_id; // Mengembalikan id_laporan yang barusan dibuat
    }
}
