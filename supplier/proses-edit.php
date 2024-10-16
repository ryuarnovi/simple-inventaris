<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Validasi inputan
if (empty($_POST["kode_supplier"])) {
    echo "Kode supplier harus diisi";
    exit();
}

if (empty($_POST["nama_supplier"])) {
    echo "Nama supplier harus diisi";
    exit();
}

// Proses edit data
$kode_supplier = $_POST["kode_supplier"];
$nama_supplier = $_POST["nama_supplier"];
$alamat_supplier = $_POST["alamat_supplier"];
$telp_supplier = $_POST["telp_supplier"];
$kota_supplier = $_POST["kota_supplier"];

$sql = "UPDATE supplier SET nama_supplier = '$nama_supplier', alamat_supplier = '$alamat_supplier', telp_supplier = '$telp_supplier', kota_supplier = '$kota_supplier' WHERE kode_supplier = '$kode_supplier'";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: data-supplier.php");
} else {
    echo "Data supplier gagal diedit";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>