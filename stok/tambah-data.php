<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Query untuk mengambil data masuk barang
$sql_masuk_barang = "SELECT kode_barang, nama_brg FROM masuk_barang";

// Eksekusi query
$result_masuk_barang = mysqli_query($conn, $sql_masuk_barang);

// Periksa hasil eksekusi query
if ($result_masuk_barang) {
    // Fetch data masuk barang
    $data_masuk_barang = mysqli_fetch_all($result_masuk_barang, MYSQLI_ASSOC);
} else {
    echo "Gagal mengambil data masuk barang";
}


// Tutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/create-stok.css">
    <title>Tambah Data Stok</title>
</head>
<body>
    <h1>Tambah Data Stok</h1>

    <form action="proses.php" method="post">
        <table>
            <tr>
                <th>Kode Barang</th>
                <td>
                    <select name="kode_barang">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($data_masuk_barang as $row) : ?>
                            <option value="<?php echo $row["kode_barang"] ?>"><?php echo $row["kode_barang"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Nama Barang</th>
                <td>
                <select name="nama_brg">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($data_masuk_barang as $row) : ?>
                            <option value="<?php echo $row["nama_brg"] ?>"><?php echo $row["nama_brg"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    </td>
            </tr>
            <tr>
                <th>Jumlah Masuk</th>
                <td><input type="number" name="jml_brg_masuk" required></td>
            </tr>
            <tr>
                <th>Jumlah Keluar</th>
                <td><input type="number" name="jml_brg_keluar" required></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><textarea name="keterangan" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>
