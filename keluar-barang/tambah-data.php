<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/create-keluar-barang.css">
    <title>Tambah Data Keluar Barang</title>
</head>
<body>

<h1>Tambah Data Keluar Barang</h1>


<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Query untuk mengambil data stok
$sql_stok = "SELECT kode_barang, nama_brg, jml_brg_keluar FROM stok";

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
                <td>ID Barang Keluar</td>
                <td><input type="text" name="id_brg_keluar"></td>
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
                <td>Tanggal Keluar</td>
                <td><input type="date" name="tgl_keluar"></td>
            </tr>
            <tr>
                <td>Penerima</td>
                <td><input type="text" name="penerima"></td>
            </tr>
            <tr>
                <td>Jumlah Barang Keluar</td>
                <td>
                <input type="text" name="jml_brg_keluar">
                </td>
            </tr>
            <tr>
                <td>Keperluan</td>
                <td><input type="text" name="keperluan"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
</form>

</body>
</html>
