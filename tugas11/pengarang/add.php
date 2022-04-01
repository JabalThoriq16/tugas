<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengarang</title>
    <?php
    include '../../connect.php';
    include '../bootstrap.php';
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
    ?>
</head>
<body>
    <center>
        <div class="card col-5">
            <div class="card-header">
                <h1>
                    <a href="index.php">Daftar Pengarang</a>
                </h1>
            </div>
            <div class="card-body">
                <form action="add.php" method="post" name="form1">
                    <table class="col-12">
                        <tr>
                            <td>Id Pengarang</td>
                            <td>
                                <input class="form-control" type="text" name="id_pengarang">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Pengarang</td>
                            <td>
                                <input class="form-control" type="text" name="nama_pengarang">
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input class="form-control" type="email" name="email">
                            </td>
                        </tr>
                        <tr>
                            <td>Telepon/hp</td>
                            <td>
                                <input class="form-control" type="number" name="telp">
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <input class="form-control" type="text" name="alamat">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input class="btn btn-primary col-3 mt-3" type="submit" name="Submit" value="Simpan"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <?php
            //Check form Submit
            if(isset($_POST['Submit'])){
                $id_pengarang = $_POST['id_pengarang'];
                $nama_pengarang = $_POST['nama_pengarang'];
                $email = $_POST['email'];
                $telp = $_POST['telp'];
                $alamat = $_POST['alamat'];

                include_once '../../connect.php';

                $result = mysqli_query($conn, "INSERT INTO `pengarang`(`id_pengarang`,`nama_pengarang`,`email`,`telp`,`alamat`) 
                VALUES ('$id_pengarang','$nama_pengarang','$email','$telp','$alamat');");
                header("Location:index.php");
            }

            
        ?>
    </center>
    
</body>
</html>