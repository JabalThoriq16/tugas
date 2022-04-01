<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penerbit</title>
    <?php
    include '../../connect.php';
    $id_penerbit = $_GET['id_penerbit'];

    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit WHERE id_penerbit = '$id_penerbit'");

    while($data = mysqli_fetch_array($penerbit)){
        $id_penerbit = $data['id_penerbit'];
        $nama_penerbit = $data['nama_penerbit'];
        $email = $data['email'];
        $telp = $data['telp'];
        $alamat = $data['alamat'];

    }

    ?>
</head>
<body>
    <center>
        <h1>
            <a href="index.php">List Penerbit</a>
        </h1>
        <hr><br><br>

        <form action="edit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
        <table width="30%" border="0.5">
            <tr>
                <td>Id Penerbit</td>
                <td style="font-size: 11pt;"><?php echo $id_penerbit; ?></td>
            </tr>
            <tr>
                <td>Nama Penerbit</td>
                <td>
                    <input type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>">
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
                $id_penerbit = $data['id_penerbit'];
                $nama_penerbit = $data['nama_penerbit'];
                $email = $data['email'];
                $telp = $data['telp'];
                $alamat = $data['alamat'];

                include_once '../../connect.php';

                $result = mysqli_query($conn, "UPDATE penerbit SET nama_penerbit='$nama_penerbit', email='$email', telp='$telp', alamat='$alamat' WHERE id_penerbit='$id_penerbit' ");
                header("Location:index.php");
            }

            
        ?>
    </center>
    
</body>
</html>