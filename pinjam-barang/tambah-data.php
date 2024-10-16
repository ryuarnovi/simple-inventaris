<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/create-pinjam-barang.css">
    <title>Tambah Data Pinjam Barang</title>
</head>
<body>
    <h1>Tambah Data Pinjam Barang</h1>

    <?php

    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "inventaris");

    // Query untuk mengambil data stok
    $sql_stok = "SELECT kode_barang, nama_brg FROM masuk_barang";

    // Eksekusi query
    $result_stok = mysqli_query($conn, $sql_stok);

    // Periksa hasil eksekusi query
    if ($result_stok) {
        // Fetch data stok
        $data_stok = mysqli_fetch_all($result_stok, MYSQLI_ASSOC);
    } else {
        echo "Gagal mengambil data stok";
    }

    ?>

    <form action="proses.php" method="post">
        <table>
            <tr>
                <td>Tanggal Pinjam</td>
                <td><input type="date" name="tgl_pinjam"></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td>
                <select name="kode_barang">
                        <?php foreach ($data_stok as $stok) { ?>
                            <option value="<?php echo $stok["kode_barang"]; ?>"><?php echo $stok["kode_barang"]; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td>
                <select name="nama_brg">
                        <?php foreach ($data_stok as $stok) { ?>
                            <option value="<?php echo $stok["nama_brg"]; ?>"><?php echo $stok["nama_brg"]; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Pinjam</td>
                <td><input type="number" name="jml_pinjam"></td>
            </tr>
            <tr>
                <td>Peminjam</td>
                <td><input type="text" name="peminjam"></td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td><input type="date" name="tgl_kembali"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><textarea name="keterangan" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

</body>
</html>
