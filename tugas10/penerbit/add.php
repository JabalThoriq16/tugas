<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penerbit</title>
    <?php
    include '../../connect.php';
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
    ?>
</head>
<body>
    <center>
        <h1>
            <a href="index.php">Home</a>
        </h1>
        <hr><br><br>

        <form action="add.php" method="post" name="form1">
        <table width="30%" border="0.5">
            <tr>
                <td>Id Penerbit</td>
                <td>
                    <input type="text" name="id_penerbit">
                </td>
            </tr>
            <tr>
                <td>Nama Penerbit</td>
                <td>
                    <input type="text" name="nama_penerbit">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="email">
                </td>
            </tr>
            <tr>
                <td>Telepon/hp</td>
                <td>
                    <input type="number" name="telp">
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <input type="text" name="alamat">
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
        </form>

        <?php
            //Check form Submit
            if(isset($_POST['Submit'])){
                $id_penerbit = $_POST['id_penerbit'];
                $nama_penerbit = $_POST['nama_penerbit'];
                $email = $_POST['email'];
                $telp = $_POST['telp'];
                $alamat = $_POST['alamat'];

                include_once '../../connect.php';

                $result = mysqli_query($conn, "INSERT INTO `penerbit`(`id_penerbit`,`nama_penerbit`,`email`,`telp`,`alamat`) 
                VALUES ('$id_penerbit','$nama_penerbit','$email','$telp','$alamat');");
                header("Location:index.php");
            }

            
        ?>
    </center>
    
</body>
</html>