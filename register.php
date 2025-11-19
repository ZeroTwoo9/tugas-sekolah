<?php 
include "koneksi.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pass_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users(username, password, email)  VALUE('$username', '$pass_hash', '$email')";
    $hasil = mysqli_query($conn, $query);

    header("location: index.html");
}
?>