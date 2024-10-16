<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/read-keluar-barang.css">
    <title>Data Keluar Barang</title>
</head>
<body>
    <h1>Data Keluar Barang</h1>
    <p><button><a href="../index.php">Beranda</a></button>|<button><a href="tambah-data.php">Tambah Data</a></button>

  <hr>
    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Penerima</th>
                <th>Tanggal Keluar</th>
                <th>Jumlah Keluar</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // Koneksi ke database
            $conn = mysqli_connect("localhost", "root", "", "inventaris");

            // Query untuk mengambil data keluar barang
            $sql_keluar = "SELECT * FROM keluar_barang";

            // Eksekusi query
            $result_keluar = mysqli_query($conn, $sql_keluar);

            // Periksa hasil eksekusi query
            if ($result_keluar) {
                // Fetch data keluar barang
                $no = 1;
                while ($data_keluar = mysqli_fetch_assoc($result_keluar)) {
                    ?>
                    <tr>
                        <td><?php echo $data_keluar["id_brg_keluar"]; ?></td>
                        <td><?php echo $data_keluar["kode_barang"]; ?></td>
                        <td><?php echo $data_keluar["nama_brg"]; ?></td>
                        <td><?php echo $data_keluar["penerima"]; ?></td>
                        <td><?php echo $data_keluar["tgl_keluar"];?></td>
                        <td><?php echo $data_keluar["jml_brg_keluar"]; ?></td>
                        <td><?php echo $data_keluar["keperluan"]; ?></td>
                        <td>
                            <a href="edit-data.php?kode_barang=<?php echo $data_keluar["kode_barang"]; ?>">Edit</a>
                            <a href="hapus-data.php?kode_barang=<?php echo $data_keluar["kode_barang"]; ?>" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "Gagal mengambil data keluar barang";
            }

            // Tutup koneksi ke database
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <a href="tambah-data.php">Tambah Data</a>
</body>
</html>
