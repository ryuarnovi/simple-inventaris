<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/update-supplier.css">
    <title>Edit Data Supplier</title>
</head>
<body>
    <h1>Edit Data Supplier</h1>

    <?php

        // Koneksi ke database
        $conn = mysqli_connect("localhost", "root", "", "inventaris");

        // Validasi inputan
        if (empty($_GET["kode_supplier"])) {
            echo "Kode supplier harus diisi";
            exit();
        }

        // Query data supplier
        $sql = "SELECT * FROM supplier WHERE kode_supplier = '" . $_GET["kode_supplier"] . "'";

        // Eksekusi query
        $result = mysqli_query($conn, $sql);

        // Menampilkan hasil query
        if ($result) {
            $row = mysqli_fetch_assoc($result);

            // Tampilkan form edit data
            echo "<form action='proses-edit.php' method='post'>";
            echo "<input type='hidden' name='kode_supplier' value='" . $row["kode_supplier"] . "'>";
            echo "<input type='text' name='nama_supplier' value='" . $row["nama_supplier"] . "' placeholder='Nama Supplier'>";
            echo "<input type='text' name='alamat_supplier' value='" . $row["alamat_supplier"] . "' placeholder='Alamat Supplier'>";
            echo "<input type='text' name='telp_supplier' value='" . $row["telp_supplier"] . "' placeholder='Telepon Supplier'>";
            echo "<input type='text' name='kota_supplier' value='" . $row["kota_supplier"] . "' placeholder='Kota Supplier'>";
            echo "<input type='submit' value='Edit'>";
            echo "</form>";
        } else {
            echo "Data supplier tidak ditemukan";
        }

        // Tutup koneksi ke database
        mysqli_close($conn);
    ?>
</body>
</html>
