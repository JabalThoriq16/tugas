<?php
    include '../../connect.php';
    $penerbit =mysqli_query($conn, 
        "SELECT * FROM penerbit
        ORDER BY id_penerbit ASC
        ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Penerbit</title>
    <?php include '../bootstrap.php' ?>
</head>
<body>
    <center>
        <div class="bg-primary" style="height: 60px; font-size:40px">
            <a class="btn text-light m-2" href="../buku/index.php">Buku</a>
            <a class="btn text-light m-2" href="index.php">Penerbit</a>
            <a class="btn text-light m-2" href="../pengarang/index.php">Pengarang</a>
            <a class="btn text-light m-2" href="../katalog/index.php">katalog</a>
        </div>>
    </center>
    <div class="container-xl table-responsive">
        <h1 class="text-center m-3">Daftar Penerbit</h1>
        <a class="btn btn-primary m-2" href="add.php">Add New Penerbit</a><br><br>
        <table class="table table-bordered table-hover table-striped">

            <tr class="text-center">
                <th>Id</th>
                <th>Nama Penerbit</th>
                <th>Email</th>
                <th>Tlpn</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            
            <?php
                while ($data = mysqli_fetch_array($penerbit)) {
                    echo "<tr>";
                    echo "<td>".$data['id_penerbit']."</td>";
                    echo "<td>".$data['nama_penerbit']."</td>";
                    echo "<td>".$data['email']."</td>";
                    echo "<td>".$data['telp']."</td>";
                    echo "<td>".$data['alamat']."</td>";
                    echo "<td class='text-center'><a class='btn btn-primary' href='edit.php?id_penerbit=$data[id_penerbit]'>Edit</a>"." "."<a class='btn btn-danger' href='delete.php?id_penerbit=$data[id_penerbit]'>Hapus</a></td></tr>";

                };
            ?>
        </table>

    </div>
</body>
</html>