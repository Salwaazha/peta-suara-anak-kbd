<?php
session_start();
include_once __DIR__ . '/../config/db.php';

// Import model-model
include_once __DIR__ . '/../models/LaporanMasalah.php';
include_once __DIR__ . '/../models/KategoriMasalah.php';
include_once __DIR__ . '/../models/SpesifikasiMasalah.php';

// Validasi koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari session
$tanggal       = $_SESSION['tanggal_laporan'];
$jenis_masalah = $_SESSION['jenis_masalah'];
$jenis_spesifik = $_SESSION['jenis_spesifik']; 
$lampiran       = $_SESSION['lampiran'] ?? null;
$deskripsi      = $_SESSION['deskripsi_laporan']; 
$nik            = $_SESSION['nik']; 

// Simpan ke tabel laporanmasalah
$id_laporan = LaporanMasalah::buat($nik, $tanggal);

// Simpan ke tabel kategorimasalah
KategoriMasalah::simpan($id_laporan, $jenis_masalah);

// Simpan ke tabel spesifikasimasalah
SpesifikasiMasalah::simpan($jenis_spesifik, $deskripsi, $lampiran);



// Kosongkan session
unset($_SESSION['tanggal_laporan'], $_SESSION['jenis_masalah'], $_SESSION['jenis_spesifik'], $_SESSION['lampiran'], $_SESSION['deskripsi_laporan']);
header("Location: dashboard_anak.php");
exit;

?>
