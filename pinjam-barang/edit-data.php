<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/update-pinjam-barang.css">
    <title>Edit Data Pinjam Barang</title>
</head>
<body>
    <h1>Edit Data Pinjam Barang</h1>

    <?php

    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "inventaris");

    // Ambil data dari URL
    $id = $_GET["no_pinjam"];

    // Query untuk mengambil data pinjam barang
    $sql_pinjam = "SELECT * FROM pinjam_barang WHERE no_pinjam = '$id'";

    // Eksekusi query
    $result_pinjam = mysqli_query($conn, $sql_pinjam);

    // Periksa hasil eksekusi query
    if ($result_pinjam) {
        // Fetch data pinjam barang
        $data_pinjam = mysqli_fetch_assoc($result_pinjam);
    } else {
        echo "Gagal mengambil data pinjam barang";
    }

    ?>

    <form action="proses-edit.php" method="post">
        <input type="hidden" name="no_pinjam" value="<?php echo $data_pinjam["no_pinjam"]; ?>">

        <table>
            <tr>
                <td>Tanggal Pinjam</td>
                <td><input type="date" name="tgl_pinjam" value="<?php echo $data_pinjam["tgl_pinjam"]; ?>"></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td>
                <select name="kode_barang">
                        <?php

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

                        foreach ($data_stok as $stok) {
                            if ($stok["kode_barang"] == $data_pinjam["kode_barang"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            ?>
                            <option value="<?php echo $stok["kode_barang"]; ?>" <?php echo $selected; ?>><?php echo $stok["kode_barang"]; ?></option>
                            <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td>
                <select name="nama_brg">
                        <?php

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

                        foreach ($data_stok as $stok) {
                            if ($stok["nama_brg"] == $data_pinjam["nama_brg"]) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            ?>
                            <option value="<?php echo $stok["nama_brg"]; ?>" <?php echo $selected; ?>><?php echo $stok["nama_brg"]; ?></option>
                            <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Pinjam</td>
                <td><input type="number" name="jml_pinjam" value="<?php echo $data_pinjam["jml_pinjam"]; ?>"></td>
            </tr>
            <tr>
                <td>Peminjam</td>
                <td><input type="text" name="peminjam" value="<?php echo $data_pinjam["peminjam"]; ?>"></td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td><input type="date" name="tgl_kembali" value="<?php echo $data_pinjam["tgl_kembali"]; ?>"></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><textarea name="keterangan" id="" cols="30" rows="10"><?php echo $data_pinjam["keterangan"]; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

</body>
</html>
