<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $spesifikasi = $_POST['spesifikasi'];
    $_SESSION['jenis_spesifik'] = $_POST['spesifikasi'];
    $_SESSION['deskripsi_laporan'] = $_POST['deskripsi'];
    $_SESSION['lampiran'] = $_FILES['lampiran']['name']; // kalau pakai file

    
    if ($spesifikasi === 'Lainnya' && !empty($_POST['spesifikasi_lain'])) {
        $_SESSION['spesifikasi_masalah'] = $_POST['spesifikasi_lain'];
    } else {
        $_SESSION['spesifikasi_masalah'] = $spesifikasi;
    }

    header("Location: ../public/wilayah.php");
    exit();
}

$kategori = $_SESSION['jenis_masalah'] ?? '';
$opsi = [];

switch ($kategori) {
    case 'Bullying':
        $opsi = ['Verbal', 'Fisik', 'Non Verbal', 'Sosial', 'Cyber', 'Seksual', 'Lainnya'];
        break;
    case 'Kekerasan':
        $opsi = ['Verbal', 'Fisik', 'Non Verbal', 'Psikis', 'Gender', 'Seksual', 'Lainnya'];
        break;
    case 'Eksploitasi':
        $opsi = ['Seksual', 'Tenaga Kerja', 'Perdagangan Manusia Berjaringan', 'Lainnya'];
        break;
    case 'Pernikahan Dini':
        $opsi = ['Hendak Dilakukan', 'Sudah Terjadi', 'Akan Dilakukan belum Mendapat Dispensasi', 'Diluar Nikah', 'Lainnya'];
        break;
    case 'Putus Sekolah':
        $opsi = ['SD', 'SMP', 'SMA'];
        break;
    case 'Diskriminasi':
        $opsi = ['Ras', 'Suku', 'Agama', 'Gender', 'Disabilitas', 'Usia', 'Status Daerah', 'Status Sosial', 'Ekonomi', 'Lainnya'];
        break;
    case 'Penelantaran':
        $opsi = ['Fisik', 'Pendidikan', 'Emosional', 'Medis', 'Pengawasan', 'Lainnya'];
        break;
    case 'Akses Pendidikan':
        $opsi = ['Formal', 'Non-Formal', 'Informal'];
        break;
    case 'Gangguan Mental':
        $opsi = ['Ksecemasan', 'Suasana Hati', 'Kepribadian', 'Psikotik', 'Makan', 'OCD', 'PTSD', 'Disosiatif', 'ADHD', 'Lainnya'];
        break;
    case 'Gangguan Perkembangan':
        $opsi = ['Gangguan Bicara dan Bahasa', 'Kognitif', 'Motorik', 'Belajar', 'Autisme', 'Keterbelakangan Mental', 'CAPD', 'Lainnya'];
        break;
    case 'Dampak Anak Broken Home':
        $opsi = ['Gangguan Mental', 'Anti Sosial', 'Merasa Bersalah', 'Perubahan Suasana Hati', 'Kepercayaan Diri', 'Kesehatan Fisik', 'Lainnya'];
        break;
    case 'Melihat Kejadian':
        $opsi = ['Kekerasan', 'Pembunuhan', 'Bullying', 'Eksploitasi atau Perdagangan Manusia', 'Broken Home', 'KDRT', 'Lainnya'];
        break;
    case 'Gangguan Gizi':
        $opsi = ['Kekurangan Gizi', 'Kelebihan Gizi', 'Kelaparan', 'Lainnya'];
        break;
    default:
        $opsi = ['Lainnya'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spesifikasi Masalah</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@600;800&display=swap');

        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background: #FBCFE8;
        }

        .header {
            background:rgb(236, 144, 197);
            padding: 10px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header img {
            height: 65px;
            margin-right: 12px;
        }

        .header h1 {
            font-size: 22px;
            font-weight: 800;
            color: white;
            margin: 0;
        }

        .container {
            max-width: 400px;
            margin: 24px auto;
            background: #FFE4F1;
            border-radius: 24px;
            padding: 24px;
            text-align: center;
        }

        .title {
            font-size: 28px;
            font-weight: 800;
            color: #4B0A1A;
            margin-bottom: 8px;
        }

        .subtitle {
            font-size: 18px;
            color: #7D3F4C;
            margin-bottom: 16px;
        }

        select, input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            font-size: 12px;
            margin-top: 12px;
            border-radius: 20px;
            border: none;
            background: #D988A1;
            color: white;
            appearance: none;
        }

        select:focus, input[type="text"]:focus, textarea:focus {
            outline: none;
            background-color: #E08199;
        }

        textarea {
            resize: vertical;
            height: 80px;
            width: 372px;
            color: white;
        }

        .file-wrapper {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            border-radius: 20px;
            background: #D988A1;
            color: white;
            box-sizing: border-box;
            text-align: left;
        }

        .file-wrapper input[type="file"] {
            background: transparent;
            color: white;
            border: none;
            width: 100%;
        }

        button {
            background-color: #A14C63;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 20px;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            cursor: pointer;
        }

        .bantuan {
            display: inline-block;
            margin-top: 16px;
            padding: 8px 16px;
            background-color: #FBCFE8;
            color: #A14C63;
            border: 2px solid #A14C63;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }

        .image-container img {
            width: 100%;
            max-width: 200px;
            margin: 16px auto;
            display: block;
        }

        .lainnya-input {
            display: none;
        }

        .form-label {
            font-size: 18px;
            color: #4B0A1A;
            margin-bottom: 6px;
            display: block;
        }

        select, textarea, input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 0px solid #ccc;
            border-radius: 22px;
            font-size: 16px;
            margin-bottom: 6px;
            box-sizing: border-box;
        }

        .lainnya-input {
            display: none;
        }
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <img src="../assets/logo.png" alt="Logo"> <!-- Ganti path jika perlu -->
    <h1>PETA SUARA ANAK</h1>
</div>

<div class="container">
    <div class="image-container">
        <img src="../assets/specify-icon.png" alt="Ilustrasi">
    </div>

    <div class="title">SPESIFIKASI MASALAH</div>
    <div class="subtitle">Spesifikasi masalah: <?= htmlspecialchars($kategori) ?></div>
    <div class="subtitle" style="font-weight: normal;">Pilih kedetailan pada masalahmu</div>

    <form method="POST" action="" enctype="multipart/form-data">
        <!-- Dropdown Spesifikasi -->
        <select name="spesifikasi" id="spesifikasi" onchange="toggleLainnya()" required>
            <option value="">Pilih Spesifikasi</option>
            <?php foreach ($opsi as $o): ?>
                <option value="<?= $o ?>"><?= $o ?></option>
            <?php endforeach; ?>
        </select>

        <!-- Input "lainnya" -->
        <div id="lainnya-input" class="lainnya-input">
            <input type="text" name="spesifikasi_lain" placeholder="Tuliskan di sini...">
        </div>

        <!-- Deskripsi -->
        <textarea name="deskripsi" placeholder="Ceritakan masalahmu di sini..."></textarea>

        <!-- Lampiran -->
        <div class="file-wrapper">
            <label for="lampiran">Pilih Lampiran:</label><br>
            <input type="file" name="lampiran" id="lampiran" accept="image/*">
        </div>

        <!-- Tombol lanjut -->
        <button type="submit">Lanjut</button>

        <!-- Tombol bantuan -->
        <br>
        <a href="bantuan.php" class="bantuan">Bantuan</a>
    </form>
</div>

<script>
function toggleLainnya() {
    const value = document.getElementById("spesifikasi").value;
    const lainnyaInput = document.getElementById("lainnya-input");
    lainnyaInput.style.display = (value === "Lainnya") ? "block" : "none";
}
</script>

</body>
</html>