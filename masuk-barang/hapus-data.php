<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil id data yang akan dihapus
$id = $_GET["id_msk_brg"];

// Query untuk menghapus data
$sql = "DELETE FROM masuk_barang WHERE id_msk_brg = '$id'";

// Eksekusi query
$result = mysqli_query($conn, $sql);

// Periksa hasil eksekusi query
if ($result) {
    // Redirect ke halaman data masuk barang
    header("Location: data-masuk-barang.php");
} else {
    echo "Gagal menghapus data masuk barang";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
