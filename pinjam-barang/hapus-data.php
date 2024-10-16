<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil data dari URL
$no_pinjam = $_GET["no_pinjam"];

// Query untuk mengambil data pinjam barang
$sql_pinjam = "SELECT * FROM pinjam_barang WHERE no_pinjam = '$no_pinjam'";

// Eksekusi query
$result_pinjam = mysqli_query($conn, $sql_pinjam);

// Periksa hasil eksekusi query
if ($result_pinjam) {
    // Fetch data pinjam barang
    $data_pinjam = mysqli_fetch_assoc($result_pinjam);
} else {
    echo "Gagal mengambil data pinjam barang";
}

// Query untuk hapus data pinjam barang
$sql_hapus = "DELETE FROM pinjam_barang WHERE no_pinjam='$no_pinjam'";

// Eksekusi query
$result_hapus = mysqli_query($conn, $sql_hapus);

// Periksa hasil eksekusi query
if ($result_hapus) {
    // Jika berhasil, tampilkan pesan sukses
    echo "<script>alert('Data berhasil dihapus');</script>";
    echo "<script>window.location.href='../masuk-barang/tambah-data.php';</script>";
} else {
    echo "Gagal menghapus data pinjam barang";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
