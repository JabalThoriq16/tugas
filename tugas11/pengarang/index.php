<?php
    include '../../connect.php';
    $pengarang =mysqli_query($conn, 
        "SELECT * FROM pengarang
        ORDER BY id_pengarang ASC
        ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pengarang</title>
    <?php include '../bootstrap.php' ?>
</head>
<body>
    <center>
        <div class="bg-primary" style="height: 60px; font-size:40px">
            <a class="btn text-light m-2" href="../buku/index.php">Buku</a>
            <a class="btn text-light m-2" href="../penerbit/index.php">Penerbit</a>
            <a class="btn text-light m-2" href="index.php">Pengarang</a>
            <a class="btn text-light m-2" href="../katalog/index.php">katalog</a>
        </div>
    </center>

    <div class="container-xl table-responsive">
        <h1 class="text-center m-3">Daftar Penerbit</h1>
        <a class="btn btn-primary m-3" href="add.php">Add New Pengarang</a>
        <table class="table table-bordered table-hover table-striped">

            <tr class="text-center">
                <th>Id</th>
                <th>Nama Pengarang</th>
                <th>Email</th>
                <th>Tlpn</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            
            <?php
                while ($data = mysqli_fetch_array($pengarang)) {
                    echo "<tr>";
                    echo "<td>".$data['id_pengarang']."</td>";
                    echo "<td>".$data['nama_pengarang']."</td>";
                    echo "<td>".$data['email']."</td>";
                    echo "<td>".$data['telp']."</td>";
                    echo "<td>".$data['alamat']."</td>";
                    echo "<td class='text-center'><a class='btn btn-primary' href='edit.php?id_pengarang=$data[id_pengarang]'>Edit</a>"." "."<a class='btn btn-danger' href='delete.php?id_pengarang=$data[id_pengarang]'>Hapus</a></td></tr>";

                };
            ?>
        </table>
    </div>
</body>
</html>