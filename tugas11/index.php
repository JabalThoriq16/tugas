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
    <title>Tugas 11</title>
    <?php include 'bootstrap.php' ?>
</head>
<body>
    <center>
        <div class="bg-primary" style="height: 60px; font-size:40px"> 
            <a class="text-light m-2" href="buku/index.php">Buku</a>
            <a class="text-light m-2" href="penerbit/index.php">Penerbit</a>
            <a class="text-light m-2" href="pengarang/index.php">Pengarang</a>
            <a class="text-light m-2" href="katalog/index.php">katalog</a>
        </div>
    </center>
    <br><br>
    <div class="container-fluid">
        <d class="card">
            <div class="card-header">
               <h1>Dashboard</h1>
            </div>
            <div class="card-body">
                <p>Selamat datang di Perpusatakaan Kami.. <br> Semoga hari Mu Menyenangkan, dan dapat menemukan buku yang anda cari.</p>
            </div>
        </d>
    </div>
</body>
</html>