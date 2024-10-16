<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/update-masuk-barang.css">
    <title>Edit Data Masuk Barang</title>
</head>
<body>
    <h1>Edit Data Masuk Barang</h1>

    <?php

        // Koneksi ke database
        $conn = mysqli_connect("localhost", "root", "", "inventaris");

        // Ambil id data yang akan diedit
        $id_msk_brg = $_GET["id_msk_brg"];

        // Query untuk mengambil data masuk barang
        $sql_masuk_barang = "SELECT * FROM masuk_barang WHERE id_msk_brg = '$id_msk_brg'";

        // Eksekusi query
        $result_masuk_barang = mysqli_query($conn, $sql_masuk_barang);

        // Periksa hasil eksekusi query
        if ($result_masuk_barang) {
            // Fetch data masuk barang
            $data_masuk_barang = mysqli_fetch_assoc($result_masuk_barang);
        } else {
            echo "Data masuk barang tidak ditemukan";
        }

        // Query untuk mengambil data supplier
        $sql_supplier = "SELECT * FROM supplier";

        // Eksekusi query
        $result_supplier = mysqli_query($conn, $sql_supplier);

        // Periksa hasil eksekusi query
        if ($result_supplier) {
            // Fetch data supplier
            $data_supplier = mysqli_fetch_all($result_supplier, MYSQLI_ASSOC);
        } else {
            echo "Data supplier tidak ditemukan";
        }

        // Tutup koneksi ke database
        mysqli_close($conn);
    ?>

    <?php if ($data_masuk_barang) : ?>
        <form action="proses-edit.php" method="post">
            <input type="hidden" name="id_msk_brg" value="<?php echo $data_masuk_barang["id_msk_brg"] ?>">
            <table>
                <tr>
                    <th>Kode Barang</th>
                    <td><input type="text" name="kode_barang" value="<?php echo $data_masuk_barang["kode_barang"] ?>"></td>
                </tr>
                <tr>
                    <th>Nama Barang</th>
                    <td><input type="text" name="nama_brg" value="<?php echo $data_masuk_barang["nama_brg"] ?>"></td>
                </tr>
                <tr>
                    <th>Tanggal Masuk</th>
                    <td><input type="date" name="tgl_masuk" value="<?php echo $data_masuk_barang["tgl_masuk"] ?>"></td>
                </tr>
                <tr>
                    <th>Jumlah Barang</th>
                    <td><input type="number" name="jml_masuk" value="<?php echo $data_masuk_barang["jml_masuk"] ?>"></td>
                </tr>
                <tr>
                    <th>Kode Supplier</th>
                    <td>
                        <select name="kode_supplier">
                            <option value="">-- Pilih --</option>
                            <?php foreach ($data_supplier as $row) : ?>
                                <option value="<?php echo $row["kode_supplier"] ?>" <?php if ($data_masuk_barang["kode_supplier"] == $row["kode_supplier"]) echo "selected" ?>><?php echo $row["nama_supplier"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
    <?php else : ?>
        <p>Data masuk barang tidak ditemukan</p>
    <?php endif; ?>

</body>
</html>
