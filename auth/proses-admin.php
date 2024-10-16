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

  if ($row["level"] != "admin") {
    echo "Anda tidak memiliki level akses yang diperlukan untuk mengakses data-user.php.";
    exit;
  }

  // Mengarahkan admin ke halaman dashboard
  header("Location: data-user.php");

} else {

  // Menampilkan pesan kesalahan
  echo "Username atau password salah.";

}

// Tutup koneksi
mysqli_close($conn);
?>


