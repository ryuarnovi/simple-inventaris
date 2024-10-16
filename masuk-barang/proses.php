<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil data dari form
$kode_barang = $_POST["kode_barang"];
$nama_barang = $_POST["nama_brg"];
$tanggal_masuk = $_POST["tgl_masuk"];
$jml_masuk = $_POST["jml_masuk"];
$kode_supplier = $_POST["kode_supplier"];


// Query untuk mengambil data masuk barang berdasarkan no_bukti
$sql_cek = "SELECT * FROM masuk_barang WHERE kode_barang = '$kode_barang'";

// Eksekusi query
$result_cek = mysqli_query($conn, $sql_cek);

// Periksa hasil eksekusi query
if ($result_cek) {
    // Fetch data masuk barang
    $data_cek = mysqli_fetch_assoc($result_cek);

    // Jika data ditemukan
    if ($data_cek) {
        // Hitung jumlah masuk baru
        $jml_masuk_baru = $data_cek["jml_masuk"] + $jml_masuk;

        // Query untuk update data masuk barang
        $sql_update = "UPDATE masuk_barang SET jml_masuk='$jml_masuk_baru' WHERE kode_barang='$kode_barang'";

        // Eksekusi query
        $result_update = mysqli_query($conn, $sql_update);

        // Periksa hasil eksekusi query
        if ($result_update) {
            // Jika berhasil, tampilkan pesan sukses
            echo "<script>alert('Data berhasil ditambahkan');</script>";
            echo "<script>window.location.href=' data-masuk-barang.php';</script>";
        } else {
            echo "Gagal menambahkan data masuk barang";
        }
    } else {
        // Jika data tidak ditemukan, maka tambahkan data seperti biasa
        $sql = "INSERT INTO masuk_barang (kode_barang, nama_brg, tgl_masuk, jml_masuk, kode_supplier) VALUES
        ('$kode_barang', '$nama_barang', '$tanggal_masuk','$jml_masuk', '$kode_supplier')";

        // Eksekusi query
        $result = mysqli_query($conn, $sql);

        // Periksa hasil eksekusi query
        if ($result) {
            header("Location: data-masuk-barang.php");
        } else {
            echo "Gagal menambahkan data masuk barang";
        }
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
