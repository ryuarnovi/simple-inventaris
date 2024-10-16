<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");

// Mendapatkan ID user yang akan dihapus
$id_user = $_GET['id_user'];

// Menghapus data user dari database
$sql = "DELETE FROM user WHERE id_user = '$id_user'";
$result = mysqli_query($conn, $sql);

// Cek apakah data berhasil dihapus
if (mysqli_affected_rows($conn) > 0) {
  // Data berhasil dihapus, arahkan kembali ke halaman read-user.php
  header("Location: data-user.php");
} else {
  // Data gagal dihapus, tampilkan pesan error
  echo "Gagal menghapus data user.";
}
?>
