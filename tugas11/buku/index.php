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
    <?php include '../bootstrap.php' ?>
</head>
<body>
    <center>
        <div class="bg-primary" style="height: 60px; font-size:40px">
            <a class="btn text-light m-2" href="index.php">Buku</a>
            <a class="btn text-light m-2" href="../penerbit/index.php">Penerbit</a>
            <a class="btn text-light m-2" href="../pengarang/index.php">Pengarang</a>
            <a class="btn text-light m-2" href="../katalog/index.php">katalog</a>
        </div>
    </center>

    <div class="container-xl table-responsive">
        <h1 class="text-center m-3">List Buku</h1>
        <a class="btn btn-primary m-2" href="add.php">Add New Buku</a><br><br>
        <table class="table table-bordered table-hover table-striped">
            <tr class="text-center">
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
                    echo "<td class='text-center'><a  class='btn btn-primary'href='edit.php?isbn=$data[isbn]'>Edit</a>"." "."<a class='btn btn-danger' href='delete.php?isbn=$data[isbn]'>Hapus</a></td></tr>";

                };
            ?>
        </table>
    </div>
    
</body>
</html>