<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/update-user.css">
  <title>Edit Data User</title>
</head>
<body>

<h1>Edit Data User</h1>

<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil ID user dari URL
$id_user = $_GET["id_user"];

// Menampilkan data user berdasarkan ID
$sql = "SELECT * FROM user WHERE id_user = $id_user";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);

  // Mengambil data user dari database
  $nama = $row["nama"];
  $username = $row["username"];
  $level = $row["level"];
?>

<form action="update-user.php?id_user=<?php echo $id_user ?>" method="post">
  <label for="nama">Nama:</label>
  <input type="text" id="nama" name="nama" value="<?php echo $nama ?>">
  <br>

  <label for="username">Username:</label>
  <input type="text" id="username" name="username" value="<?php echo $username ?>">
  <br>

  <label for="level">Level:</label>
  <select name="level">
    <option value="admin" <?php if ($level == "admin") echo "selected" ?>>Admin</option>
    <option value="user" <?php if ($level == "user") echo "selected" ?>>User</option>
  </select>
  <br>

  <input type="submit" value="Ubah">
</form>

<?php
} else {
  echo "Data user tidak ditemukan.";
}

// Tutup koneksi
mysqli_close($conn);
?>

</body>
</html>
