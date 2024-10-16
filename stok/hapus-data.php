<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil data dari URL
$kode_barang = $_GET["kode_barang"];

// Query untuk menghapus data stok
$sql_hapus = "DELETE FROM stok WHERE kode_barang = '$kode_barang'";

// Eksekusi query
$result_hapus = mysqli_query($conn, $sql_hapus);

// Periksa hasil eksekusi query
if ($result_hapus) {
    // Jika berhasil, tampilkan pesan sukses
    echo "<script>alert('Data berhasil dihapus');</script>";
    echo "<script>window.location.href='data-stok.php';</script>";
} else {
    echo "Gagal menghapus data stok";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
