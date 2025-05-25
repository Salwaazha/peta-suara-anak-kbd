<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $spesifikasi = $_POST['spesifikasi'] ?? '';
    $spesifikasi_lain = $_POST['spesifikasi_lain'] ?? '';
    $jenis_spesifik = $_POST['jenis_spesifik'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $lampiran = $_FILES['lampiran']['name'] ?? '';

    $_SESSION['jenis_spesifik'] = $jenis_spesifik;
    $_SESSION['deskripsi_laporan'] = $deskripsi;
    $_SESSION['lampiran'] = $lampiran;

    // Simpan spesifikasi ke session
    $_SESSION['spesifikasi_masalah'] = ($spesifikasi === 'Lainnya' && !empty($spesifikasi_lain))
        ? $spesifikasi_lain
        : $spesifikasi;

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

<h2>Spesifikasi Masalah: <?= htmlspecialchars($kategori) ?></h2>

<form method="POST">
    <label for="spesifikasi">Spesifikasi Masalah:</label>
    <select name="spesifikasi" id="spesifikasi" onchange="toggleLainnya()" required>
        <option value="">-- Pilih Spesifikasi --</option>
        <?php foreach ($opsi as $o): ?>
            <option value="<?= $o ?>"><?= $o ?></option>
        <?php endforeach; ?>
    </select>

    <!-- input text untuk "lainnya", sembunyikan dulu -->
    <div id="lainnya-input" style="display: none; margin-top:10px;">
        <label for="spesifikasi_lain">Masukkan spesifikasi lainnya:</label>
        <input type="text" name="spesifikasi_lain" placeholder="Tuliskan di sini...">
    </div>

    <br>
    <button type="submit">Lanjut</button>
</form>

<script>
function toggleLainnya() {
    var select = document.getElementById("spesifikasi");
    var lainnyaInput = document.getElementById("lainnya-input");

    if (select.value === "Lainnya") {
        lainnyaInput.style.display = "block";
    } else {
        lainnyaInput.style.display = "none";
    }
}
</script>
