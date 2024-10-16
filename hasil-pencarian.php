<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style-search.css">
    <title>Pencarian Data Barang</title>
</head>
<body>

<h1>Pencarian Data Barang</h1>

<button><a href="index.php">Beranda</a></button>
<hr>
<form action="hasil-pencarian.php" method="post">
    <input type="text" name="keyword" placeholder="Masukkan kata kunci">
    <input type="submit" value="Cari">
</form>

<br>

<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Mendapatkan kata kunci dan field pencarian
$keyword = $_POST["keyword"];

// Memeriksa apakah keyword adalah string
if (is_string($keyword)) {

    // Mencari data
    if ($keyword == "nama_barang") {
        $sql = "SELECT * FROM barang WHERE kode_barang LIKE '%$keyword%'";
    } else {
        $sql = "SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%'";
    }
    $result = mysqli_query($conn, $sql);

    // Menampilkan data
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Kode Barang</th>";
        echo "<th>Nama Barang</th>";
        echo "<th>Jumlah Barang</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row["kode_barang"] . "</td>";
          echo "<td>" . $row["nama_barang"] . "</td>";
          echo "<td>" . $row["jml_barang"] . "</td>";
          echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Data tidak ditemukan";
    }

} else {
    echo "Keyword harus berupa string";
}

// Tutup koneksi
mysqli_close($conn);
?>

</body>
</html>
