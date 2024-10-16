<!DOCTYPE html>
<html lang="kode_barang">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/read-barang.css">
    <title>Data Barang</title>
</head>
<body>

<h1>Data Barang</h1>
<p><button><a href="../index.php">Beranda</a></button>|<button><a href="tambah-barang.php">Tambah Data</a></button>

<hr>
<table border="1">
    <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Spesifikasi</th>
        <th>Lokasi Barang</th>
        <th>Kategori</th>
        <th>Jumlah Barang</th>
        <th>Kondisi</th>
        <th>Jenis Barang</th>
        <th>Sumber Dana</th>
        <th>Aksi</th>
    </tr>

    <?php

        // Koneksi ke database
        $conn = mysqli_connect("localhost", "root", "", "inventaris");

        // Mendapatkan data barang
        $sql = "SELECT * FROM barang";
        $result = mysqli_query($conn, $sql);

        // Menampilkan data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["kode_barang"] . "</td>";
                echo "<td>" . $row["nama_barang"] . "</td>";
                echo "<td>" . $row["spesifikasi"] . "</td>";
                echo "<td>" . $row["lokasi_barang"] . "</td>";
                echo "<td>" . $row["kategori"] . "</td>";
                echo "<td>" . $row["jml_barang"] . "</td>";
                echo "<td>" . $row["kondisi"] . "</td>";
                echo "<td>" . $row["jenis_barang"] . "</td>";
                echo "<td>" . $row["sumber_dana"] . "</td>";
                echo "<td>";
                echo "<a href='edit-barang.php?kode_barang=" . $row["kode_barang"] . "'>Edit</a>";
                echo " | ";
                echo "<a href='hapus-barang.php?kode_barang=" . $row["kode_barang"] . "'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "Data tidak ditemukan";
        }

        // Tutup koneksi
        mysqli_close($conn);
    ?>

</table>

<a href="tambah-barang.php">Tambah Data</a>

</body>
</html>
