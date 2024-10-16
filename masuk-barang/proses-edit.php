<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil data dari form
$id_msk_brg = $_POST["id_msk_brg"];
$kode_barang = $_POST["kode_barang"];
$nama_brg = $_POST["nama_brg"];
$tgl_masuk = $_POST["tgl_masuk"];
$jml_masuk = $_POST["jml_masuk"];
$kode_supplier = $_POST["kode_supplier"];

// Update data di database
$sql = "UPDATE masuk_barang SET
  kode_barang = '$kode_barang',
  nama_brg = '$nama_brg',
  tgl_masuk = '$tgl_masuk',
  jml_masuk = '$jml_masuk',
  kode_supplier = '$kode_supplier'
WHERE id_msk_brg = '$id_msk_brg'";

$result = mysqli_query($conn, $sql);

// Cek hasil query
if ($result) {
  // Jika berhasil, tampilkan pesan sukses
  echo "<script>alert('Data berhasil diperbarui');</script>";
  echo "<script>window.location.href='data-masuk-barang.php';</script>";
} else {
  // Jika gagal, tampilkan pesan error
  echo "<script>alert('Data gagal diperbarui');</script>";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
