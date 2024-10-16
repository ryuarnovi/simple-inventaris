<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Mendapatkan data dari form
$username = $_POST["username"];
$password = $_POST["password"];

// Mencari data pengguna di database
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

// Memeriksa apakah pengguna ditemukan
if (mysqli_num_rows($result) == 1) {

  // Mendapatkan data pengguna
  $row = mysqli_fetch_assoc($result);

  // Mengatur session
  session_start();
  $_SESSION["id_user"] = $row["id_user"];
  $_SESSION["nama"] = $row["nama"];
  $_SESSION["level"] = $row["level"];

  // Mengarahkan ke halaman utama
  header("Location: ../index.php");

} else {

  // Menampilkan pesan kesalahan
  echo "Username atau password salah.";

}

// Tutup koneksi
mysqli_close($conn);
?>
