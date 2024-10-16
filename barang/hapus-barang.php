<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil data dari URL
$kode_barang = $_GET["kode_barang"];

// Query untuk menghapus data barang
$sql_delete = "DELETE FROM barang WHERE kode_barang = '$kode_barang'";

// Eksekusi query
$result_delete = mysqli_query($conn, $sql_delete);

// Periksa hasil eksekusi query
if ($result_delete) {
    // Jika berhasil, tampilkan pesan sukses
    echo "<script>alert('Data barang berhasil dihapus');</script>";
    echo "<script>window.location.href='data-barang.php';</script>";
} else {
    // Jika gagal, tampilkan pesan error
    echo "Gagal menghapus data barang";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
