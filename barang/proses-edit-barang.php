<?php

    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "inventaris");

    // Mendapatkan data dari form
    $kode_barang = $_POST["kode_barang"];
    $nama_barang = $_POST["nama_barang"];
    $spesifikasi = $_POST["spesifikasi"];
    $lokasi_barang = $_POST["lokasi_barang"];
    $kategori = $_POST["kategori"];
    $jml_barang = $_POST["jml_barang"];
    $kondisi = $_POST["kondisi"];
    $jenis_barang = $_POST["jenis_barang"];
    $sumber_dana = $_POST["sumber_dana"];

    // Mengambil data jumlah barang dari database stok
    $sql_stok = "SELECT jml_brg_masuk FROM stok WHERE kode_barang='$kode_barang'";
    $result_stok = mysqli_query($conn, $sql_stok);
    $row_stok = mysqli_fetch_assoc($result_stok);

    // Memperbarui data barang
    $sql = "UPDATE barang SET nama_barang='$nama_barang', spesifikasi='$spesifikasi', lokasi_barang='$lokasi_barang', kategori='$kategori', jml_barang='$jml_barang', 
    kondisi='$kondisi', jenis_barang='$jenis_barang', sumber_dana='$sumber_dana' WHERE kode_barang='$kode_barang'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Data keluar barang berhasil diubah');</script>";
        echo "<script>window.location.href='data-barang.php';</script>";
    } else {
        echo "Data barang gagal diperbarui";
    }

    // Tutup koneksi
    mysqli_close($conn);
?>
