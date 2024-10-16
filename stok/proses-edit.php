<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil data dari form

$kode_barang = $_POST["kode_barang"];
$nama_brg = $_POST["nama_brg"];
$jml_brg_masuk = $_POST["jml_brg_masuk"];
$jml_brg_keluar = $_POST["jml_brg_keluar"];
$keterangan = $_POST["keterangan"];

// Hitung total barang
$total_brg = $jml_brg_masuk - $jml_brg_keluar;

// Query untuk update data stok
$sql_update = "UPDATE stok SET kode_barang='$kode_barang', nama_brg='$nama_brg', jml_brg_masuk='$jml_brg_masuk', jml_brg_keluar='$jml_brg_keluar', total_brg='$total_brg', keterangan='$keterangan' WHERE kode_barang='$kode_barang'";

// Eksekusi query
$result_update = mysqli_query($conn, $sql_update);

// Periksa hasil eksekusi query
if ($result_update) {
    // Jika berhasil, tampilkan pesan sukses
    echo "<script>alert('Data berhasil diubah');</script>";
    echo "<script>window.location.href='data-stok.php';</script>";
} else {
    echo "Gagal mengubah data stok";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
