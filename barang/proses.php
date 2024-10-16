<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil data dari form
$kode_barang = $_POST["kode_barang"];
$nama_barang = $_POST["nama_barang"];
$spesifikasi = $_POST["spesifikasi"];
$lokasi_barang = $_POST["lokasi_barang"];
$kategori = $_POST["kategori"];
$jml_barang = $_POST["jml_barang"];
$kondisi = $_POST["kondisi"];
$jenis_barang = $_POST["jenis_barang"];
$sumber_dana = $_POST["sumber_dana"];

// Query untuk menambahkan data barang
$sql_tambah = "INSERT INTO barang (kode_barang, nama_barang, spesifikasi, lokasi_barang, kategori, jml_barang, kondisi, jenis_barang, sumber_dana)
VALUES ('$kode_barang', '$nama_barang', '$spesifikasi', '$lokasi_barang', '$kategori', '$jml_barang', '$kondisi', '$jenis_barang', '$sumber_dana')";

// Eksekusi query
$result_tambah = mysqli_query($conn, $sql_tambah);

// Periksa hasil eksekusi query
if ($result_tambah) {
    // Jika berhasil, tampilkan pesan sukses
    echo "<script>alert('Data barang berhasil ditambahkan');</script>";
    echo "<script>window.location.href='data-barang.php';</script>";
} else {
    // Jika gagal, tampilkan pesan error
    echo "Gagal menambahkan data barang";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
