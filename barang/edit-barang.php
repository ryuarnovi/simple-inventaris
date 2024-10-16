<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/update-barang.css">
    <title>Edit Data Barang</title>
</head>
<body>

<h1>Edit Data Barang</h1>

<?php

    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "inventaris");

    // Mendapatkan data barang dari URL
    $id = $_GET["kode_barang"];
    $sql = "SELECT * FROM barang WHERE kode_barang='$id'";
    $result = mysqli_query($conn, $sql);

    // Menampilkan data barang
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    ?>

    <form action="proses-edit-barang.php" method="post">
        <input type="hidden" name="kode_barang" value="<?php echo $row["kode_barang"]; ?>">

        <table>
            <tr>
                <th>Kode Barang</th>
                <td><input type="text" name="kode_barang" value="<?php echo $row["kode_barang"]; ?>" readonly></td>
            </tr>
            <tr>
                <th>Nama Barang</th>
                <td><input type="text" name="nama_barang" value="<?php echo $row["nama_barang"]; ?>"></td>
            </tr>
            <tr>
                <th>Spesifikasi</th>
                <td><input type="text" name="spesifikasi" value="<?php echo $row["spesifikasi"]; ?>"></td>
            </tr>
            <tr>
                <th>Lokasi Barang</th>
                <td><input type="text" name="lokasi_barang" value="<?php echo $row["lokasi_barang"]; ?>"></td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td><input type="text" name="kategori" value="<?php echo $row["kategori"]; ?>"></td>
            </tr>
            <tr>
                <th>Jumlah Barang</th>
                <td><input type="text" name="jml_barang" value="<?php

                    // Mengambil data jumlah barang dari database stok
                    $sql_stok = "SELECT jml_brg_masuk FROM stok WHERE kode_barang='$id'";
                    $result_stok = mysqli_query($conn, $sql_stok);
                    $row_stok = mysqli_fetch_assoc($result_stok);

                    echo $row_stok["jml_brg_masuk"];

                ?>"></td>
            </tr>
            <tr>
                <th>Kondisi</th>
                <td><input type="text" name="kondisi" value="<?php echo $row["kondisi"]; ?>"></td>
            </tr>
            <tr>
                <th>Jenis Barang</th>
                <td><input type="text" name="jenis_barang" value="<?php echo $row["jenis_barang"]; ?>"></td>
            </tr>
            <tr>
                <th>Sumber Dana</th>
                <td><input type="text" name="sumber_dana" value="<?php echo $row["sumber_dana"]; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

<?php
    } else {
        echo "Data tidak ditemukan";
    }

    // Tutup koneksi
    mysqli_close($conn);
?>

</body>
</html>
