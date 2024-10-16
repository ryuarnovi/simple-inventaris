<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/style-index.css">
  <title>Aplikasi Inventaris Sarana dan Prasarana</title>
</head>
<body>

  <h1>Aplikasi Inventaris Sarana dan Prasarana   <button style="border-radius: 5px;"><a href="auth/tambah-user.php" style="color: black;">SIGN UP</a></button>
</h1>
  

  <ul style="background-color: black;">
    <li><a href="supplier/data-supplier.php" style="color: white;">Data Supplier</a></li>
    <li><a href="masuk-barang/data-masuk-barang.php" style="color: white;">Data Barang Masuk</a></li>
    <li><a href="stok/data-stok.php" style="color: white;">Data Stok</a></li>
    <li><a href="barang/data-barang.php" style="color: white;">Data Barang</a></li>
    <li><a href="pinjam-barang/data-pinjam-barang.php" style="color: white;">Data Barang Pinjam</a></li>
    <li><a href="keluar-barang/data-keluar-barang.php" style="color: white;">Data Barang Keluar</a></li>
    <li style="text-align: right;"><button style="border-radius: 10px; background-color: white;"><a href="auth/login-admin.php" style="color: black;">USER</a></button></li>
  </ul>

  <hr>
  <div class="information">
  <h2>Informasi</h2>
  <p>Aplikasi Inventaris Sarana dan Prasarana ini merupakan sistem informasi yang digunakan untuk mengelola data inventaris sarana dan prasarana di suatu instansi. Sistem ini dapat digunakan untuk mengelola data supplier, barang masuk, stok, barang, barang pinjam, dan barang keluar.</p>
  <p>
    Aplikasi ini memiliki beberapa fitur utama, yaitu:
    <ul>
      <li>•Mengelola data supplier</li>
      <li>•Mengelola data barang masuk</li>
      <li>•Mengelola data stok</li>
      <li>•Mengelola data barang</li>
      <li>•Mengelola data barang pinjam</li>
      <li>•Mengelola data barang keluar</li>
    </ul>
  </p>
</div>

  <hr>

  <h2>Pencarian Data</h2>

  <form action="hasil-pencarian.php" method="post">
    <input type="text" name="keyword" placeholder="Masukkan kata kunci">
    <input type="submit" value="Cari">
  </form>
  
 
</body>
</html>
