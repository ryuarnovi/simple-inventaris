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

if (empty($_POST["alamat_supplier"])) {
    echo "Alamat supplier harus diisi";
    exit();
}

if (empty($_POST["telp_supplier"])) {
    echo "Telepon supplier harus diisi";
    exit();
}

if (empty($_POST["kota_supplier"])) {
    echo "Kota supplier harus diisi";
    exit();
}

// Proses tambah data
$kode_supplier = $_POST["kode_supplier"];
$nama_supplier = $_POST["nama_supplier"];
$alamat_supplier = $_POST["alamat_supplier"];
$telp_supplier = $_POST["telp_supplier"];
$kota_supplier = $_POST["kota_supplier"];

$sql = "INSERT INTO supplier (kode_supplier, nama_supplier, alamat_supplier, telp_supplier, kota_supplier)
VALUES ('$kode_supplier', '$nama_supplier', '$alamat_supplier', '$telp_supplier', '$kota_supplier')";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: ../masuk-barang/tambah-data.php");
} else {
    echo "Data gagal ditambahkan";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
