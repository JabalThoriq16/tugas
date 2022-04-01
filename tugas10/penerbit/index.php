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
</head>
<body>
    <center>
        <h1>
            <a href="../buku/index.php">Buku</a>|
            <a href="#">Penerbit</a>|
            <a href="../pengarang/index.php">Pengarang</a>|
            <a href="../katalog/index.php">katalog</a>|
        </h1>
        <hr>
    </center>

    <a href="add.php">Add New Penerbit</a><br><br>

    <table width="80%" border="1">

        <tr>
            <th>Id</th>
            <th>Nama Penerbit/th>
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
                echo "<td><a href='edit.php?id_penerbit=$data[id_penerbit]'>Edit</a>|<a href='delete.php?id_penerbit=$data[id_penerbit]'>Hapus</a></td></tr>";

            };
        ?>
    </table>
</body>
</html>