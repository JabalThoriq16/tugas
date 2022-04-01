<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <?php
    include '../../connect.php';
    include '../bootstrap.php';
    $penerbit = mysqli_query($conn, "SELECT * FROM penerbit");
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang");
    $katalog = mysqli_query($conn, "SELECT * FROM katalog");
    ?>
</head>
<body>
    <center>
        <div class="card col-5">
            <div class="card-header">
                <h1>
                    <a href="index.php">List Buku</a>
                </h1>
            </div>
            <div class="card-body">
                <form  action="add.php" method="post" name="form1">
                <table class="col-12">
                    <tr>
                        <td class="form-label">ISBN</td>
                        <td>
                            <input class="form-control" type="text" name="isbn">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">Judul</td>
                        <td>
                            <input class="form-control" type="text" name="judul">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">Tahun</td>
                        <td>
                            <input class="form-control" type="text" name="tahun">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">Penerbit</td>
                        <td>
                            <select class="form-select" name="id_penerbit">
                                
                                <?php
                                    while ($data = mysqli_fetch_array($penerbit)) {
                                        echo "<option value='".$data['id_penerbit']."'>".$data['nama_penerbit']."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">Pengarang</td>
                        <td>
                            <select class="form-select" name="id_pengarang">
                                
                                <?php
                                    while ($data = mysqli_fetch_array($pengarang)) {
                                        echo "<option value='".$data['id_pengarang']."'>".$data['nama_pengarang']."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">Katalog</td>
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
                        <td class="form-label">Qantity Stock</td>
                        <td>
                            <input class="form-control" type="text" name="qty_stok">
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">Harga Pinjam</td>
                        <td>
                            <input class="form-control" type="text" name="harga_pinjam">
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
                $isbn = $_POST['isbn'];
                $judul = $_POST['judul'];
                $tahun = $_POST['tahun'];
                $id_penerbit = $_POST['id_penerbit'];
                $id_pengarang = $_POST['id_pengarang'];
                $id_katalog = $_POST['id_katalog'];
                $qty_stok = $_POST['qty_stok'];
                $harga_pinjam = $_POST['harga_pinjam'];

                include_once '../../connect.php';

                $result = mysqli_query($conn, "INSERT INTO `buku`(`isbn`,`judul`,`tahun`,`id_penerbit`,`id_pengarang`,`id_katalog`,`qty_stok`,`harga_pinjam`) 
                VALUES ('$isbn','$judul','$tahun','$id_penerbit','$id_pengarang','$id_katalog','$qty_stok','$harga_pinjam');");
                header("Location:index.php");
            }

            
        ?>
    </center>
    
</body>
</html>