<?php
include_once __DIR__ . '/../config/db.php';

$berhasil = false;
$nama_anak = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_POST['nik'];
    $nama_anak = $_POST['nama_anak'];
    $jk = $_POST['jenis_kelamin'];
    $tgl_lahir = $_POST['tanggal_lahir'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO anak (nik, nama_anak, jenis_kelamin, tanggal_lahir, password, alamat)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nik, $nama_anak, $jk, $tgl_lahir, $password, $alamat);

    if ($stmt->execute()) {
        $berhasil = true;
    } else {
        echo "Gagal daftar: " . $stmt->error;
    }
}
?>

<?php if ($berhasil): ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Berhasil Daftar</title>
    <style>
        body {
            background-color: #f9cbdc;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #f8b4c7;
            display: flex;
            align-items: center;
            padding: 15px 25px;
            font-weight: bold;
            color: white;
        }
        .header img {
            height: 50px;
            margin-right: 12px;
        }

        .header span {
            font-size: 24px; /* diperbesar */
        }

        .container {
            max-width: 450px;
            margin: 120px auto;
            background-color: #ffeaea;
            border-radius: 22px;
            padding: 32px;
            text-align: center;
            box-shadow: 0px 0px 17px rgba(0,0,0,0.1);
        }
        .container h1 {
            font-size: 26px;
            color: #5e0b29;
        }
        .container p {
            font-size: 18px;
            color: #5e0b29;
            margin-top: 10px;
        }
        .container img {
            width: 150px;
            margin: 22px 0;
        }
        .btn {
            background-color: #b45a6c;
            color: white;
            border: none;
            border-radius: 22px;
            padding: 12px 32px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            text-decoration: none;
            display: inline-block;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #8a4c5f;
            font-size: 16px;
        }

        .btn,
        .bantuan {
            background-color: #b45a6c;
            color: white;
            border: none;
            border-radius: 22px;
            padding: 12px 32px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            text-decoration: none;
            display: inline-block;
        }

        .bantuan {
            margin-top: 10px;
        }

        .btn:hover,
        .bantuan:hover {
            background-color: #a24c60;
        }
    </style>
</head>
<body>

<div class="header">
    <img src="../assets/logo.png" alt="Logo">
    <span>PETA SUARA ANAK</span>
</div>

<div class="container">
    <h1>SELAMAT <?= htmlspecialchars($nama_anak) ?>!!! 🎉🎉</h1>
    <img src="../assets/checklist.png" alt="Checkmark">
    <h1>KAMU SUDAH TERDAFTAR!</h1>
    <p>Klik Masuk untuk melanjutkan!</p>
    <a href="login_anak.php" class="btn">MASUK</a><br>
    <a href="bantuan.php" class="bantuan">BANTUAN</a>
</div>

</body>
</html>
<?php endif; ?>
