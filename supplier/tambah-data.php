<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/create-supplier.css">
    <title>Tambah Data Supplier</title>
</head>
<body>
    <h1>Tambah Data Supplier</h1>
    <form action="proses.php" method="post">
        <table>
            <tr>
                <td>Kode Supplier</td>
                <td><input type="text" name="kode_supplier" placeholder="Kode Supplier"></td>
            </tr>
            <tr>
                <td>Nama Supplier</td>
                <td><input type="text" name="nama_supplier" placeholder="Nama Supplier"></td>
            </tr>
            <tr>
                <td>Alamat Supplier</td>
                <td><input type="text" name="alamat_supplier" placeholder="Alamat Supplier"></td>
            </tr>
            <tr>
                <td>Telepon Supplier</td>
                <td><input type="text" name="telp_supplier" placeholder="Telepon Supplier"></td>
            </tr>
            <tr>
                <td>Kota Supplier</td>
                <td><input type="text" name="kota_supplier" placeholder="Kota Supplier"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
