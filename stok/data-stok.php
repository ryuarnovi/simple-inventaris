<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/read-stok.css">
    <title>Data Stok</title>
</head>
<body>
    <h1>Data Stok</h1>
    <p><button><a href="../index.php">Beranda</a></button>|<button><a href="tambah-data.php">Tambah Data</a></button>

  <hr>
    <table border="1">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Masuk</th>
                <th>Jumlah Keluar</th>
                <th>Total Barang</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // Koneksi ke database
            $conn = mysqli_connect("localhost", "root", "", "inventaris");

            // Query untuk mengambil data stok
            $sql_stok = "SELECT * FROM stok";

            // Eksekusi query
            $result_stok = mysqli_query($conn, $sql_stok);

            // Periksa hasil eksekusi query
            if ($result_stok) {
                // Fetch data stok
                while ($data_stok = mysqli_fetch_assoc($result_stok)) {
                    ?>
                    <tr>
                        <td><?php echo $data_stok["kode_barang"]; ?></td>
                        <td><?php echo $data_stok["nama_brg"]; ?></td>
                        <td><?php echo $data_stok["jml_brg_masuk"]; ?></td>
                        <td><?php echo $data_stok["jml_brg_keluar"]; ?></td>
                        <td><?php echo $data_stok["total_brg"]; ?></td>
                        <td><?php echo $data_stok["keterangan"]; ?></td>
                        <td>
                            <a href="edit-data.php?kode_barang=<?php echo $data_stok["kode_barang"]; ?>">Edit</a>
                            <a href="hapus-data.php?kode_barang=<?php echo $data_stok["kode_barang"]; ?>" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "Gagal mengambil data stok";
            }

            // Tutup koneksi ke database
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <a href="tambah-data.php">Tambah Data</a>
</body>
</html>
