<?php
$severname = "localhost";
$database = "tugas";
$username = "root";
$password = "";

//create connection
$conn = mysqli_connect($severname,$username,$password,$database);

//check connection 
if (!$conn) {
    die("Connection failed :" .mysqli_connect_error());
}

// echo "connection successfully";
// mysqli_close($conn);
?>