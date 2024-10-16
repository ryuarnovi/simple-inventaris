<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/create-barang.css">
    <title>Tambah Data Barang</title>
</head>
<body>

<h1>Tambah Data Barang</h1>


<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Query untuk mengambil data stok
$sql_stok = "SELECT kode_barang, jml_brg_masuk FROM stok";

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
                <td><input type="texxt" name="nama_barang"></td>
            </tr>
                       
            <tr>
                <td>Spesifikasi</td>
                <td><input type="text" name="spesifikasi"></td>
            </tr>
                       
            <tr>
                <td>Lokasi Barang</td>
                <td><input type="text" name="lokasi_barang"></td>
            </tr>
                       
            <tr>
                <td>Kategori</td>
                <td><input type="text" name="kategori"></td>
            </tr>
            <tr>
                <td>Jumlah Barang</td>
                <td>
                <select name="jml_barang">
                        <?php foreach ($data_stok as $stok) { ?>
                            <option value="<?php echo $stok["jml_brg_masuk"]; ?>"><?php echo $stok["jml_brg_masuk"]; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Kondisi</td>
                <td><input type="text" name="kondisi"></td>
            </tr>
                       
            <tr>
                <td>Jenis Barang</td>
                <td><input type="text" name="jenis_barang"></td>
            </tr>
                       
            <tr>
                <td>Sumber Dana</td>
                <td><input type="text" name="sumber_dana"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
</form>

</body>
</html>
