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
    $isbn = $_GET['isbn'];

    $buku = mysqli_query($conn, "SELECT * FROM buku WHERE isbn='$isbn'");
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
    $katalog = mysqli_query($conn, "SELECT * FROM katalog");

    while($data = mysqli_fetch_array($buku)){
        $isbn = $data['isbn'];
        $judul = $data['judul'];
        $tahun = $data['tahun'];
        $id_penerbit = $data['id_penerbit'];
        $id_pengarang = $data['id_pengarang'];
        $id_katalog = $data['id_katalog'];
        $qty_stok = $data['qty_stok'];
        $harga_pinjam = $data['harga_pinjam'];

    }

    ?>
</head>
<body>
    <center>
        <div class="card col-5">
            <div class="card-header">
                <h1>
                    <a href="index.php">Home</a>
                </h1>
            </div>
            <div class="card-body">
                <form action="edit.php?isbn=<?php echo $isbn; ?>" method="post">
                    <table class="col-12">
                        <tr>
                            <td>ISBN</td>
                            <td style="font-size: 11pt;"><?php echo $isbn; ?></td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td>
                                <input class="form-control" type="text" name="judul" value="<?php echo $judul; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td>
                                <input class="form-control" type="text" name="tahun" value="<?php echo $tahun; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td>
                                <select class="form-select" name="id_penerbit">
                                    
                                    <?php
                                        while ($data = mysqli_fetch_array($penerbit)) {
                                            echo "<option "
                                            .($data['id_penerbit'] == $id_penerbit ? 'selected' : '').
                                            " value='"
                                            .$data['id_penerbit']."'>".$data['nama_penerbit']."</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Pengarang</td>
                            <td>
                                <select class="form-select" name="id_pengarang">
                                    
                                    <?php
                                        while ($data = mysqli_fetch_array($pengarang)) {
                                            echo "<option value='"
                                            .$data['id_pengarang']."'>".$data['nama_pengarang'].
                                            "</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Katalog</td>
                            <td>
                                <select class="form-select" name="id_katalog">
                                    
                                    <?php
                                        while ($data = mysqli_fetch_array($katalog)) {
                                            echo "<option value='".$data['id_katalog']."'>".$data['nama']."</option>";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Qantity Stock</td>
                            <td>
                                <input class="form-control" type="text" name="qty_stok" value="<?php echo $qty_stok; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Harga Pinjam</td>
                            <td>
                                <input class="form-control" type="text" name="harga_pinjam" value="<?php echo $harga_pinjam; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input class="btn btn-primary col-3 mt-3" type="submit" name="Submit" value="Add"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <?php
            //Check form Submit
            if(isset($_POST['Submit'])){
                $isbn = $_POST['isbn'];
                $judul = $_POST['judul'];
                $tahun = $_POST['tahun'];
                $id_penerbit = $_POST['id_penerbit'];
                $id_pengarang = $_POST['id_pengarang'];
                $id_katalog = $_POST['id_katalog'];
                $qty_stok = $_POST['qty_stok'];
                $harga_pinjam = $_POST['harga_pinjam'];

                include_once '../../connect.php';

                $result = mysqli_query($conn, "UPDATE buku SET judul='$judul', tahun='$tahun', id_penerbit='$id_penerbit', id_pengarang='$id_pengarang', id_katalog='$id_katalog', qty_stok='$qty_stok', harga_pinjam='$harga_pinjam' WHERE isbn='$isbn' ");
                header("Location:index.php");
            }

            
        ?>
    </center>
    
</body>
</html>