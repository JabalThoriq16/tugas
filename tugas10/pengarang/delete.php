<?php 
include '../../connect.php';

$id_pengarang = $_GET['id_pengarang'];

$result = mysqli_query($conn, "DELETE FROM pengarang WHERE id_pengarang = '$id_pengarang'");

header("Location:index.php");
?>
