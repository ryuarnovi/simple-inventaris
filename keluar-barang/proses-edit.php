<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil data dari form
$id_brg_keluar = $_POST["id_brg_keluar"];
$kode_barang = $_POST["kode_barang"];
$nama_brg = $_POST["nama_brg"];
$jml_brg_keluar = $_POST["jml_brg_keluar"];
$tgl_keluar = $_POST["tgl_keluar"];
$keperluan = $_POST["keperluan"];
$penerima = $_POST["penerima"];

// Query untuk mengubah data keluar barang
$sql_update = "UPDATE keluar_barang SET
    kode_barang = '$kode_barang',
    nama_brg = '$nama_brg',
    jml_brg_keluar = '$jml_brg_keluar',
    tgl_keluar = '$tgl_keluar',
    penerima = '$penerima',
    keperluan = '$keperluan'
    WHERE id_brg_keluar = '$id_brg_keluar'";

// Eksekusi query
$result_update = mysqli_query($conn, $sql_update);

// Periksa hasil eksekusi query
if ($result_update) {
    // Jika berhasil, tampilkan pesan sukses
    echo "<script>alert('Data keluar barang berhasil diubah');</script>";
    echo "<script>window.location.href='data-keluar-barang.php';</script>";
} else {
    // Jika gagal, tampilkan pesan error
    echo "Gagal mengubah data keluar barang";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
