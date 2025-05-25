class Insight {
    public static function getAll() {
        include '../config/koneksi.php';
        $result = $conn->query("SELECT * FROM insight");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}