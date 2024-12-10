<?php
error_reporting(E_ALL);
include_once("koneksi.php");

if (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];

    $sql = "DELETE FROM data_barang WHERE id_barang = {$id_barang}";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID barang tidak ditemukan!";
    exit;
}
?>
