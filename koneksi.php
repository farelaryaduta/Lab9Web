<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "latihan1";

$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn == false) 
{
    echo "Koneksi Ke Server Gagal!";
    die();
} #else echo "Koneksi Berhasil";
?>