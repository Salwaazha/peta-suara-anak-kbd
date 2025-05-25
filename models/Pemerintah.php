class Pemerintah {
    public static function getAll() {
        include '../config/koneksi.php';
        $result = $conn->query("SELECT * FROM pemerintah");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
