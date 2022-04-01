<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengarang</title>
    <?php
    include '../../connect.php';
    $id_pengarang = $_GET['id_pengarang'];

    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang WHERE id_pengarang = '$id_pengarang'");

    while($data = mysqli_fetch_array($pengarang)){
        $id_pengarang = $data['id_pengarang'];
        $nama_pengarang = $data['nama_pengarang'];
        $email = $data['email'];
        $telp = $data['telp'];
        $alamat = $data['alamat'];

    }

    ?>
</head>
<body>
    <center>
        <h1>
            <a href="index.php">List Pengarang</a>
        </h1>
        <hr><br><br>

        <form action="edit.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
        <table width="30%" border="0.5">
            <tr>
                <td>Id Pengarang</td>
                <td style="font-size: 11pt;"><?php echo $id_pengarang; ?></td>
            </tr>
            <tr>
                <td>Nama Pengarang</td>
                <td>
                    <input type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                </td>
            </tr>
            <tr>
                <td>Telepon / Hp</td>
                <td>
                    <input type="text" name="telp" value="<?php echo $telp; ?>">
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <input type="text" name="alamat" value="<?php echo $alamat; ?>">
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
                $id_pengarang = $data['id_pengarang'];
                $nama_pengarang = $data['nama_pengarang'];
                $email = $data['email'];
                $telp = $data['telp'];
                $alamat = $data['alamat'];

                include_once '../../connect.php';

                $result = mysqli_query($conn, "UPDATE pengarang SET nama_pengarang='$nama_pengarang', email='$email', telp='$telp', alamat='$alamat' WHERE id_pengarang='$id_pengarang' ");
                header("Location:index.php");
            }

            
        ?>
    </center>
    
</body>
</html>