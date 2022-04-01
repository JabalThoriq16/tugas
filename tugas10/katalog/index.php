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
</head>
<body>
    <center>
        <h1>
            <a href="../buku/index.php">Buku</a>|
            <a href="../penerbit/index.php">Penerbit</a>|
            <a href="../pengarang/index.php">Pengarang</a>|
            <a href="#">katalog</a>|
        </h1>
        <hr>
    </center>

    <a href="add.php">Add New Katalog</a><br><br>

    <table width="80%" border="1">

        <tr>
            <th>Id Katalog</th>
            <th>Nama Katalog</th>
            <th>Aksi</th>
        </tr>
        
        <?php
            while ($data = mysqli_fetch_array($katalog)) {
                echo "<tr>";
                echo "<td>".$data['id_katalog']."</td>";
                echo "<td>".$data['nama']."</td>";
                echo "<td><a href='edit.php?isbn=$data[id_katalog]'>Edit</a>|<a href='delete.php?id_katalog=$data[id_katalog]'>Hapus</a></td></tr>";

            };
        ?>
    </table>
</body>
</html>