<?php
include 'connect.php';

$sql = "SELECT * FROM buku";
$result = $conn->query($sql);

if ($result->num_rows>0) {
    //output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Buku :".$row["isbn"]." ".$row["judul"]."<br>";
    }
}else{
    echo "0 Results";
}

$sql1="SELECT * FROM anggota";
$result1 = $conn->query($sql1);

if ($result1->num_rows>0) {
    //Output data anggota
    while ($row = $result1->fetch_assoc()) {
        echo "Nama :".$row["nama"]." ".$row["telp"]."<br>";
    }
}else{
    echo "0 Result";
}
?>