<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
    <?php
    include '../../connect.php';
    $id_katalog = $_GET['id_katalog'];

    $katalog = mysqli_query($conn, "SELECT * FROM katalog WHERE id_katalog = '$id_katalog' ");

    while($data = mysqli_fetch_array($katalog)){
        $id_katalog = $data['id_$id_katalog'];
        $nama = $data['nama'];
    }

    ?>
</head>
<body>
    <center>
        <h1>
            <a href="index.php">List Katalog</a>
        </h1>
        <hr><br><br>

        <form action="edit.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
        <table width="30%" border="0.5">
            <tr>
                <td>Id Katalog</td>
                <td style="font-size: 11pt;"><?php echo $id_katalog; ?></td>
            </tr>
            <tr>
                <td>Nama Katalog</td>
                <td>
                    <input type="text" name="nama" value="<?php echo $nama; ?>">
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
                $id_katalog = $_POST['id_katalog'];
                $nama = $_POST['nama'];

                include_once '../../connect.php';

                $result = mysqli_query($conn, "UPDATE katalog SET nama='$nama' WHERE id_katalog='$id_katalog' ");
                header("Location:index.php");
            }

            
        ?>
    </center>
    
</body>
</html>