<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Query data masuk barang
$sql = "SELECT * FROM masuk_barang";

// Eksekusi query
$result = mysqli_query($conn, $sql);

// Menampilkan hasil query
if ($result) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Data masuk barang tidak ditemukan";
}

// Tutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/read-masuk-barang.css">
    <title>Data Masuk Barang</title>
</head>
<body>

    <h1>Data Masuk Barang</h1>
    <p><button><a href="../index.php">Beranda</a></button>|<button><a href="tambah-data.php">Tambah Data</a></button>

  <hr>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Tanggal Masuk</th>
                <th>Jumlah Barang</th>
                <th>Kode Supplier</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if ($data) : ?>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?php echo $row["id_msk_brg"] ?></td>
                        <td><?php echo $row["kode_barang"] ?></td>
                        <td><?php echo $row["nama_brg"] ?></td>
                        <td><?php echo $row["tgl_masuk"] ?></td>
                        <td><?php echo $row["jml_masuk"] ?></td>
                        <td><?php echo $row["kode_supplier"] ?></td>
                        <td><a href="edit-data.php?id_msk_brg=<?php echo $row["id_msk_brg"] ?>">Edit</a></td>
                        <td><a href="hapus-data.php?id_msk_brg=<?php echo $row["id_msk_brg"] ?>">Hapus</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="9">Data masuk barang tidak ditemukan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="tambah-data.php">Tambah Data</a>
</body>
</html>
