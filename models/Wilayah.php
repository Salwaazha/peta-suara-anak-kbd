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
        $query = "INSERT INTO wilayah (provinsi, kabupaten_kota, kecamatan) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $provinsi, $kabupaten, $kecamatan);
        $stmt->execute();

        return $conn->insert_id; // kembalikan ID wilayah yg baru dibuat
    }
}
