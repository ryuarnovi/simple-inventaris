<?php

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Get data from the form
$id_keluar = $_POST["id_brg_keluar"];
$kode_barang = $_POST["kode_barang"];
$nama_brg = $_POST["nama_brg"];
$tanggal_keluar = $_POST["tgl_keluar"];
$penerima = $_POST["penerima"];
$jml_keluar = $_POST["jml_brg_keluar"];
$keperluan = $_POST["keperluan"];

// Query to get stock data based on product code
$sql_stok = "SELECT kode_barang, nama_brg, total_brg FROM stok WHERE kode_barang = '$kode_barang'";

// Execute the query
$result_stok = mysqli_query($conn, $sql_stok);

// Check the query execution results

if ($result_stok) {
    // Fetch data
    $data_stok = mysqli_fetch_assoc($result_stok);

    // Get stock data
    $jml_brg_awal = $data_stok["total_brg"];

    // Query to add exit goods data to the "keluar_barang" (exit goods) database
    $sql_tambah = "INSERT INTO keluar_barang (id_brg_keluar, kode_barang, nama_brg, tgl_keluar, penerima, jml_brg_keluar, keperluan) 
    VALUES ('$id_keluar', '$kode_barang', '$nama_brg', '$tanggal_keluar','$penerima', '$jml_keluar', '$keperluan')";

    // Execute the query
    $result_tambah = mysqli_query($conn, $sql_tambah);

    // Check the query execution results
    if ($result_tambah) {
        // If successful, update stock
        $jml_brg_sisa = $jml_brg_awal - $jml_keluar;
        $sql_update_stok = "UPDATE stok SET total_brg='$jml_brg_sisa' WHERE kode_barang='$kode_barang'";

        // Execute the stock update query
        $result_update_stok = mysqli_query($conn, $sql_update_stok);

        // Check the stock update query execution results
        if ($result_update_stok) {
            // If successful, display a success message
            echo "<script>alert('Data berhasil ditambahkan');</script>";
            echo "<script>window.location.href='data-keluar-barang.php';</script>";
        } else {
            // If failed, display an error message
            echo "Gagal menambahkan data keluar barang";
        }
    } else {
        echo "Gagal menambahkan data keluar barang";
    }
} else {
    echo "Gagal mengambil data stok";
}

// Close the database connection
mysqli_close($conn);
