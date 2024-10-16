<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Validasi input
if (empty($_POST["nama"])) {
  echo "Nama harus diisi.";
  exit;
}

if (empty($_POST["username"])) {
  echo "Username harus diisi.";
  exit;
}

if (empty($_POST["password"])) {
  echo "Password harus diisi.";
  exit;
}

// Menambahkan data ke database
$sql = "INSERT INTO user (nama, username, password, level) VALUES ('$_POST[nama]', '$_POST[username]', '$_POST[password]', 'user')";
$result = mysqli_query($conn, $sql);

// Memeriksa apakah data berhasil ditambahkan
if ($result) {
  echo "Data berhasil ditambahkan.";
} else {
  echo "Data gagal ditambahkan.";
}

// Tutup koneksi
mysqli_close($conn);
?>
