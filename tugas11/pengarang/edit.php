<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengarang</title>
    <?php
    include '../../connect.php';
    include '../bootstrap.php';
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
        <div class="card col-12">
            <div class="card-header">
                <h1>
                    <a href="index.php">Daftar Pengarang</a>
                </h1>
            </div>
            <div class="card-body">
                <form action="edit.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
                    <table width="30%" border="0.5">
                        <tr>
                            <td>Id Pengarang</td>
                            <td style="font-size: 11pt;"><?php echo $id_pengarang; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Pengarang</td>
                            <td>
                                <input class="form-control" type="text" name="nama_pengarang" value="<?php echo $nama_pengarang; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input class="form-control" type="text" name="email" value="<?php echo $email; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Telepon / Hp</td>
                            <td>
                                <input class="form-control" type="text" name="telp" value="<?php echo $telp; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <input class="form-control" type="text" name="alamat" value="<?php echo $alamat; ?>">
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