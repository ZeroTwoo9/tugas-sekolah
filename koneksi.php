<?php 

$server = "localhost";
$name = "root";
$pass = "";
$db = "hehe";

$conn = mysqli_connect($server, $name, $pass, $db);

if (!$conn){
    echo "koneksi gagal";
}
?>