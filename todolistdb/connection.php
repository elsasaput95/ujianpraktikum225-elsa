<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "todolistdb"; 

$connect = mysqli_connect($host, $user, $pass, $db);

if (!$connect){
    die("Koneksi gagal" .mysqli_connect_error());
}
?>