<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
    <?php
    include '../../connect.php';
    include '../bootstrap.php';
    $id_katalog = $_GET['id_katalog'];

    $katalog = mysqli_query($conn, "SELECT * FROM katalog WHERE id_katalog = '$id_katalog' ");

    while($data = mysqli_fetch_array($katalog)){
        $id_katalog = $data['id_katalog'];
        $nama = $data['nama'];
    }

    ?>
</head>
<body>
    <center>
        <div class="card col-5">
            <div class="card-header">
                <h1>
                    <a href="index.php">List Katalog</a>
                </h1>
            </div>
            <dic class="card-body">
                <form action="edit.php?id_katalog=<?php echo $id_katalog; ?>" method="post">
                    <table class="col-12">
                        <tr>
                            <td>Id Katalog</td>
                            <td style="font-size: 11pt;"><?php echo $id_katalog; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Katalog</td>
                            <td>
                                <input class="form-control" type="text" name="nama" value="<?php echo $nama; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input class="btn btn-primary col-3 mt-3" type="submit" name="Submit" value="Add"></td>
                        </tr>
                    </table>
                </form>
            </dic>
        </div>

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