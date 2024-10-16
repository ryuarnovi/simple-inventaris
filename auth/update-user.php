<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Ambil data dari formulir
$id_user = $_POST["id_user"];
$nama = $_POST["nama"];
$username = $_POST["username"];
$level = $_POST["level"];

// Periksa apakah data sudah lengkap
if (empty($nama) || empty($username) || empty($level)) {
  echo "Data tidak lengkap.";
  exit();
}

// Update data user
$sql = "UPDATE user SET nama='$nama', username='$username', level='$level' WHERE id_user=$id_user";
$result = mysqli_query($conn, $sql);

if ($result) {
  echo "Data user berhasil diubah.";
} else {
  echo "Data user gagal diubah.";
}

// Tutup koneksi
mysqli_close($conn);
?>
