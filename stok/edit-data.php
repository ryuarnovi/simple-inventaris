<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/update-stok.css">
    <title>Edit Data Stok</title>
</head>
<body>
    <h1>Edit Data Stok</h1>

    <?php

    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "inventaris");

    // Ambil data dari URL
    $kode_barang = $_GET["kode_barang"];

    // Query untuk mengambil data stok
    $sql_stok = "SELECT * FROM stok WHERE kode_barang = '$kode_barang'";

    // Eksekusi query
    $result_stok = mysqli_query($conn, $sql_stok);

    // Periksa hasil eksekusi query
    if ($result_stok) {
        // Fetch data stok
        $data_stok = mysqli_fetch_assoc($result_stok);
    } else {
        echo "Gagal mengambil data stok";
    }

    ?>

    <form action="proses-edit.php" method="post">
        <table>
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="kode_barang" value="<?php echo $data_stok["kode_barang"]; ?>"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_brg" value="<?php echo $data_stok["nama_brg"]; ?>"></td>
            </tr>
            <tr>
                <td>Jumlah Masuk</td>
                <td><input type="number" name="jml_brg_masuk" value="<?php echo $data_stok["jml_brg_masuk"]; ?>"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><textarea name="keterangan"><?php echo $data_stok["keterangan"]; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

</body>
</html>
