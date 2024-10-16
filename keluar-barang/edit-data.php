<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/update-keluar-barang.css">
    <title>Edit Data Keluar Barang</title>
</head>
<body>
    <h1>Edit Data Keluar Barang</h1>

    <?php

    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "inventaris");

    // Ambil data dari URL
    $kode_keluar = $_GET["kode_barang"];

    // Query untuk mengambil data keluar barang berdasarkan kode keluar
    $sql_keluar = "SELECT * FROM keluar_barang WHERE kode_barang = '$kode_keluar'";

    // Eksekusi query
    $result_keluar = mysqli_query($conn, $sql_keluar);

    // Periksa hasil eksekusi query
    if ($result_keluar) {
        // Fetch data keluar barang
        $data_keluar = mysqli_fetch_assoc($result_keluar);
    } else {
        echo "Gagal mengambil data keluar barang";
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
    ?>

    <form action="proses-edit.php" method="post">
        <input type="hidden" name="id_brg_keluar" value="<?php echo $data_keluar["id_brg_keluar"]; ?>">

        <table>
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="kode_barang" value="<?php echo $data_keluar["kode_barang"]; ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_brg" value="<?php echo $data_keluar["nama_brg"]; ?>"></td>
            </tr>
            <tr>
                <td>Penerima</td>
                <td><input type="text" name="penerima" value="<?php echo $data_keluar["penerima"]; ?>"></td>
            </tr>
            <tr>
                <td>Tanggal Keluar</td>
                <td><input type="date" name="tgl_keluar" value="<?php echo $data_keluar["tgl_keluar"] ?>"></td>
            </tr>
            <tr>
                <td>Jumlah Keluar</td>
                <td><input type="number" name="jml_brg_keluar" value="<?php echo $data_keluar["jml_brg_keluar"]; ?>" readonly></td>
            </tr>
            <tr>
                <td>keperluan</td>
                <td><input type="text" name="keperluan" value="<?php echo $data_keluar["keperluan"]; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

    <button><a href="data-keluar-barang.php">Kembali</a></button>
</body>
</html>
