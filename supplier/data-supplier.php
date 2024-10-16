<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/data-supplier.css">
    <title>Data Supplier</title>
</head>
<body>

    <h1>Data Supplier</h1>
    <p><button><a href="../index.php">Beranda</a></button>|<button><a href="tambah-data.php">Tambah Data</a></button>

    <hr>
    <table border="1">
        <thead>
            <tr>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
                <th>Telepon Supplier</th>
                <th>Kota Supplier</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php

            // Koneksi ke database
            $conn = mysqli_connect("localhost", "root", "", "inventaris");

            // Query data supplier
            $sql = "SELECT * FROM supplier";

            // Eksekusi query
            $result = mysqli_query($conn, $sql);

            // Menampilkan hasil query
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["kode_supplier"] . "</td>";
                echo "<td>" . $row["nama_supplier"] . "</td>";
                echo "<td>" . $row["alamat_supplier"] . "</td>";
                echo "<td>" . $row["telp_supplier"] . "</td>";
                echo "<td>" . $row["kota_supplier"] . "</td>";
                echo "<td>";
                echo "<a href='edit-data.php?kode_supplier=" . $row["kode_supplier"] . "'>Edit</a> | ";
                echo "<a href='hapus-data.php?kode_supplier=" . $row["kode_supplier"] . "'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }

            // Tutup koneksi ke database
            mysqli_close($conn);
        ?>
        </tbody>
    </table>

</body>
</html>
