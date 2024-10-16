<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/read-pinjam-barang.css">
    <title>Data Pinjam Barang</title>
</head>
<body>
    <h1>Data Pinjam Barang</h1>
    <p><button><a href="../index.php">Beranda</a></button>|<button><a href="tambah-data.php">Tambah Data</a></button>

  <hr>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Tanggal Pinjam</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Pinjam</th>
            <th>Peminjam</th>
            <th>Tanggal Kembali</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>

        <?php

        // Koneksi ke database
        $conn = mysqli_connect("localhost", "root", "", "inventaris");

        // Query untuk mengambil data pinjam barang
        $sql_pinjam = "SELECT * FROM pinjam_barang";

        // Eksekusi query
        $result_pinjam = mysqli_query($conn, $sql_pinjam);

        // Periksa hasil eksekusi query
        if ($result_pinjam) {
            // Fetch data pinjam barang
            $no = 1;
            while ($data_pinjam = mysqli_fetch_assoc($result_pinjam)) {
                ?>

                <tr>
                    <td><?php echo $data_pinjam["no_pinjam"]; ?></td>
                    <td><?php echo $data_pinjam["tgl_pinjam"]; ?></td>
                    <td><?php echo $data_pinjam["kode_barang"]; ?></td>
                    <td><?php echo $data_pinjam["nama_brg"]; ?></td>
                    <td><?php echo $data_pinjam["jml_pinjam"]; ?></td>
                    <td><?php echo $data_pinjam["peminjam"]; ?></td>
                    <td><?php echo $data_pinjam["tgl_kembali"]; ?></td>
                    <td><?php echo $data_pinjam["keterangan"]; ?></td>
                    <td>
                        <a href="edit-data.php?no_pinjam=<?php echo $data_pinjam["no_pinjam"]; ?>">Edit</a> |
                        <a href="hapus-data.php?no_pinjam=<?php echo $data_pinjam["no_pinjam"]; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>

                <?php
                $no++;
            }
        } else {
            echo "Gagal mengambil data pinjam barang";
        }

        // Tutup koneksi ke database
        mysqli_close($conn);
        ?>
    </table>
    <a href="tambah-data.php">Tambah Data</a>

</body>
</html>
