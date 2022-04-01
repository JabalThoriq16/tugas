<?php
    include '../../connect.php';
    $buku =mysqli_query($conn, 
        "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog,qty_stok FROM buku
        LEFT JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang
        LEFT JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit
        LEFT JOIN katalog ON katalog.id_katalog = buku.id_katalog
        ORDER BY judul ASC
        ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 10</title>
</head>
<body>
    <center>
        <h1>
            <a href="index.php">Buku</a>|
            <a href="../penerbit/index.php">Penerbit</a>|
            <a href="../pengarang/index.php">Pengarang</a>|
            <a href="../katalog/index.php">katalog</a>|
        </h1>
        <hr>
    </center>

    <a href="add.php">Add New Buku</a><br><br>

    <table width="80%" border="1">

        <tr>
            <th>ISBN</th>
            <th>Judul</th>
            <th>Tahuun</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Katalog</th>
            <th>Stock</th>
            <th>Haraga pinjam</th>
            <th>Aksi</th>
        </tr>
        
        <?php
            while ($data = mysqli_fetch_array($buku)) {
                echo "<tr>";
                echo "<td>".$data['isbn']."</td>";
                echo "<td>".$data['judul']."</td>";
                echo "<td>".$data['tahun']."</td>";
                echo "<td>".$data['nama_pengarang']."</td>";
                echo "<td>".$data['nama_penerbit']."</td>";
                echo "<td>".$data['nama_katalog']."</td>";
                echo "<td>".$data['qty_stok']."</td>";
                echo "<td>".$data['harga_pinjam']."</td>";
                echo "<td><a href='edit.php?isbn=$data[isbn]'>Edit</a>|<a href='delete.php?isbn=$data[isbn]'>Hapus</a></td></tr>";

            };
        ?>
    </table>
</body>
</html>