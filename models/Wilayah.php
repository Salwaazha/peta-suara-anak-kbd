<?php
class Wilayah {
    public static function getAll() {
        global $conn;
        $query = "SELECT * FROM wilayah";
        $result = $conn->query($query);

        $data = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public static function simpan($provinsi, $kabupaten, $kecamatan) {
        global $conn;

        // Cek apakah wilayah dengan data ini sudah ada
        $queryCek = "SELECT idwilayah FROM wilayah WHERE provinsi = ? AND kabupatenkota = ? AND kecamatan = ?";
        $stmtCek = $conn->prepare($queryCek);
        $stmtCek->bind_param("sss", $provinsi, $kabupaten, $kecamatan);
        $stmtCek->execute();
        $result = $stmtCek->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['idwilayah']; // Sudah ada, return ID
        }

        // Kalau belum ada, insert baru
        $queryInsert = "INSERT INTO wilayah (provinsi, kabupatenkota, kecamatan) VALUES (?, ?, ?)";
        $stmtInsert = $conn->prepare($queryInsert);
        $stmtInsert->bind_param("sss", $provinsi, $kabupaten, $kecamatan);
        $stmtInsert->execute();

        return $conn->insert_id;
    }
}
