<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/read-user.css">
  <title>Data User</title>
</head>
<body>

<h1>Data User</h1>

<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Menampilkan data dari database
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

// Memeriksa apakah ada data yang ditemukan
if (mysqli_num_rows($result) > 0) {

  // Menampilkan data
  echo "<table border='1'>";
  echo "<tr>";
  echo "<th>ID User</th>";
  echo "<th>Nama</th>";
  echo "<th>Username</th>";
  echo "<th>Level</th>";
  echo "<th>Aksi</th>";
  echo "</tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    $id_user = $row["id_user"];
    $nama = $row["nama"];
    $username = $row["username"];
    $level = $row["level"];

    echo "<tr>";
    echo "<td>$id_user</td>";
    echo "<td>$nama</td>";
    echo "<td>$username</td>";
    echo "<td>$level</td>";
    echo "<td><a href='edit-user.php?id_user=$id_user'>Edit</a> | 
    <a href='delete-user.php?id_user=$id_user'>Hapus</a></td>";
    echo "</tr>";
  }
  echo "</table>";

} else {

  // Menampilkan pesan jika tidak ada data yang ditemukan
  echo "Data tidak ditemukan.";

}

// Tutup koneksi
mysqli_close($conn);
?>

</body>
</html>
