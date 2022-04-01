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
</head>
<body>
    <center>
        <h1>
            <a href="../buku/index.php">Buku</a>|
            <a href="../penerbit/index.php">Penerbit</a>|
            <a href="#">Pengarang</a>|
            <a href="../katalog/index.php">katalog</a>|
        </h1>
        <hr>
    </center>

    <a href="add.php">Add New Pengarang</a><br><br>

    <table width="80%" border="1">

        <tr>
            <th>Id</th>
            <th>Nama Pengarang/th>
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
                echo "<td><a href='edit.php?id_pengarang=$data[id_pengarang]'>Edit</a>|<a href='delete.php?id_pengarang=$data[id_pengarang]'>Hapus</a></td></tr>";

            };
        ?>
    </table>
</body>
</html>