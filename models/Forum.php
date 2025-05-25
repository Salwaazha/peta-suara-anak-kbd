class Forum {
    public static function getAll() {
        include '../config/koneksi.php';
        $result = $conn->query("SELECT * FROM forum");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

