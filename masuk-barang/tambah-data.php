<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Query data supplier
$sql = "SELECT kode_supplier, nama_supplier FROM supplier";

// Eksekusi query
$result = mysqli_query($conn, $sql);

// Menampilkan hasil query
if ($result) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Data supplier tidak ditemukan";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/create-masuk-barang.css">
    <title>Tambah Data Masuk Barang</title>
</head>
<body>
    <h1>Tambah Data Masuk Barang</h1>

    <form action="proses.php" method="post">
        <input type="hidden" name="kode_supplier" value="">
        <table>
        <tr>
                <th>Kode Barang</th>
                <td><input type="text" name="kode_barang" required></td>
            </tr>
            <tr>
            <tr>
                <th>Nama Barang</th>
                <td><input type="text" name="nama_brg" required></td>
            </tr>
                <th>Tanggal Masuk</th>
                <td><input type="date" name="tgl_masuk" required></td>
            </tr>
            <tr>
                <th>Jumlah Masuk</th>
                <td><input type="number" name="jml_masuk" required></td>
            </tr>
            <tr>
                <th>Kode Supplier</th>
                <td>
                    <select name="kode_supplier" id="kode_supplier">
                        <?php foreach ($data as $row) : ?>
                            <option value="<?php echo $row["kode_supplier"] ?>"><?php echo $row["kode_supplier"] . " - " . $row["nama_supplier"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
