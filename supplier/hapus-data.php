<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Validasi inputan
if (empty($_GET["kode_supplier"])) {
    echo "Kode supplier harus diisi";
    exit();
}

// Proses hapus data
$sql = "DELETE FROM supplier WHERE kode_supplier = '" . $_GET["kode_supplier"] . "'";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: data-supplier.php");
} else {
    echo "Data supplier gagal dihapus";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
