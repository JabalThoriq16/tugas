<?php
    include '../../connect.php';
    $katalog =mysqli_query($conn, 
        "SELECT * FROM katalog
        ORDER BY nama ASC
        ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Katalog</title>
    <?php include '../bootstrap.php' ?>
</head>
<body>
    <center>
        <div class="bg-primary" style="height: 60px; font-size:40px">
            <a class="btn text-light m-2" href="../buku/index.php">Buku</a>
            <a class="btn text-light m-2" href="../penerbit/index.php">Penerbit</a>
            <a class="btn text-light m-2" href="../pengarang/index.php">Pengarang</a>
            <a class="btn text-light m-2" href="index.php">katalog</a>
        </div>
    </center>

    <div class="container-xl table-responsive">
        <h1 class="text-center m-3">List Katalog</h1>
        <a class="btn btn-primary m-3" href="add.php">Add New Katalog</a>
        <table class="table table-bordered table-hover table-striped">

            <tr class="text-center">
                <th>Id Katalog</th>
                <th>Nama Katalog</th>
                <th>Aksi</th>
            </tr>
            
            <?php
                while ($data = mysqli_fetch_array($katalog)) {
                    echo "<tr>";
                    echo "<td>".$data['id_katalog']."</td>";
                    echo "<td>".$data['nama']."</td>";
                    echo "<td class='text-center'><a class='btn btn-primary' href='edit.php?id_katalog=$data[id_katalog]'>Edit</a>"." "."<a class='btn btn-danger' href='delete.php?id_katalog=$data[id_katalog]'>Hapus</a></td></tr>";

                };
            ?>
        </table>
    </div>
</body>
</html>