<?php
require_once '../config/db.php';

class Anak {
    public static function getByNIK($nik) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM anak WHERE nik = ?");
        $stmt->bind_param("s", $nik);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // mengembalikan data anak
    }
}
