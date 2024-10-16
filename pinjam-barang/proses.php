<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil data dari form
$tgl_pinjam = $_POST["tgl_pinjam"];
$kode_barang = $_POST["kode_barang"];
$nama_brg = $_POST["nama_brg"];
$jml_pinjam = $_POST["jml_pinjam"];
$peminjam = $_POST["peminjam"];
$tgl_kembali = $_POST["tgl_kembali"];
$keterangan = $_POST["keterangan"];

// Query untuk mengambil data stok
$sql_stok = "SELECT total_brg FROM stok WHERE kode_barang = '$kode_barang'";

// Eksekusi query
$result_stok = mysqli_query($conn, $sql_stok);

// Periksa hasil eksekusi query
if ($result_stok) {
    // Fetch data stok
    $data_stok = mysqli_fetch_assoc($result_stok);

    // Hitung stok baru
    $total_brg_baru = $data_stok["total_brg"] - $jml_pinjam;

    // Query untuk update data stok
    $sql_update = "UPDATE stok SET total_brg='$total_brg_baru' WHERE kode_barang='$kode_barang'";

    // Eksekusi query
    $result_update = mysqli_query($conn, $sql_update);
} else {
    echo "Gagal mengambil data stok";
}

// Query untuk menambahkan data pinjam barang
$sql_tambah = "INSERT INTO pinjam_barang (tgl_pinjam, kode_barang, nama_brg, jml_pinjam, peminjam, tgl_kembali, keterangan) 
VALUES ('$tgl_pinjam', '$kode_barang', '$nama_brg', '$jml_pinjam', '$peminjam', '$tgl_kembali', '$keterangan')";

// Eksekusi query
$result_tambah = mysqli_query($conn, $sql_tambah);

// Periksa hasil eksekusi query
if ($result_tambah) {
    // Jika berhasil, tampilkan pesan sukses
    echo "<script>alert('Data berhasil disimpan');</script>";
    echo "<script>window.location.href='data-pinjam-barang.php';</script>";
} else {
    echo "Gagal menambahkan data pinjam barang";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
