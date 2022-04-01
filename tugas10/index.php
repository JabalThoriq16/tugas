<?php
    include '../connect.php';
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
            <a href="buku/index.php">Buku</a>|
            <a href="penerbit/index.php">Penerbit</a>|
            <a href="pengarang/index.php">Pengarang</a>|
            <a href="katalog/index.php">katalog</a>|
        </h1>
        <hr>
    </center>
    <br><br>
    <h1>Dashboard</h1>
</body>
</html>