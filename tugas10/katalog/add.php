<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Katalog</title>
    <?php
    include '../../connect.php';
    $katalog = mysqli_query($conn, "SELECT * FROM katalog");
    ?>
</head>
<body>
    <center>
        <h1>
            <a href="index.php">List Katalog</a>
        </h1>
        <hr><br><br>

        <form action="add.php" method="post" name="form1">
        <table width="30%" border="0.5">
            <tr>
                <td>Id Katalog</td>
                <td>
                    <input type="text" name="id_katalog">
                </td>
            </tr>
            <tr>
                <td>Nama Katalog</td>
                <td>
                    <input type="text" name="nama">
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

                $result = mysqli_query($conn, "INSERT INTO `katalog`(`id_katalog`,`nama`) 
                VALUES ('$id_katalog','$nama');");
                header("Location:index.php");
            }

            
        ?>
    </center>
    
</body>
</html>