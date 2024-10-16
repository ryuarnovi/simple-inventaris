<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil data dari form
$kode_barang = $_POST["kode_barang"];
$nama_brg = $_POST["nama_brg"];
$jml_brg_masuk = $_POST["jml_brg_masuk"];
$jml_brg_keluar = $_POST["jml_brg_keluar"];
$keterangan = $_POST["keterangan"];

// Query untuk mengambil data stok
$sql_stok = "SELECT jml_brg_masuk, jml_brg_keluar FROM stok WHERE kode_barang = '$kode_barang'";

// Eksekusi query
$result_stok = mysqli_query($conn, $sql_stok);

// Periksa hasil eksekusi query
if ($result_stok) {
    // Fetch data stok
    $data_stok = mysqli_fetch_assoc($result_stok);

    // Hitung total barang
    $total_brg = $jml_brg_masuk- $jml_brg_keluar;
} else {
    // Jika tidak ada data stok, set total barang menjadi 0
    $total_brg = 0;
}

// Query untuk menambahkan data ke database stok
$sql_tambah_stok = "INSERT INTO stok (kode_barang, nama_brg, jml_brg_masuk, jml_brg_keluar, total_brg, keterangan) 
VALUES ('$kode_barang', '$nama_brg', '$jml_brg_masuk','$jml_brg_keluar', '$total_brg', '$keterangan') ON DUPLICATE KEY UPDATE 
jml_brg_masuk=VALUES(jml_brg_masuk), jml_brg_keluar=VALUES(jml_brg_keluar), total_brg=VALUES(total_brg), keterangan=VALUES(keterangan)";

// Eksekusi query
$result_tambah_stok = mysqli_query($conn, $sql_tambah_stok);

// Periksa hasil eksekusi query
if ($result_tambah_stok) {
    // Jika berhasil, tampilkan pesan sukses
    echo "<script>alert('Data berhasil disimpan');</script>";
    echo "<script>window.location.href='data-stok.php';</script>";
} else {
    // Jika gagal, tampilkan pesan error
    echo "Gagal menambahkan data stok";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
