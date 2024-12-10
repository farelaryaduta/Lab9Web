<?php
error_reporting(E_ALL);
include_once("koneksi.php");

if (isset($_GET['id_barang'])) {
    $id = $_GET['id_barang'];
    $sql = "SELECT * FROM data_barang WHERE id_barang = {$id}";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
}

if (isset($_POST["submit"])) {
    $id = $_POST['id_barang'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;

    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destination = dirname(__FILE__) . '/gambar/' . $filename;
        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = $filename;
        }
    }

    $sql = "UPDATE data_barang 
            SET nama = '{$nama}', 
                kategori = '{$kategori}', 
                harga_jual = '{$harga_jual}', 
                harga_beli = '{$harga_beli}', 
                stok = '{$stok}', 
                gambar = '{$gambar}' 
            WHERE id_barang = {$id}";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
function is_select($var, $val) {
    if ($var == $val) return 'selected="selected"';
    return false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
</head>

<style>
    .container .main .input {
        margin-top: 10px;
    }

    .container .main .input .submit {
        margin-top: 10px;
    }
</style>

<body>
    <div class="container">
        <h1>Edit Barang</h1>
        <div class="main">
            <form method="post" action="ubah.php?id_barang=<?php echo $data['id_barang']; ?>" enctype="multipart/form-data" />
                <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>" />
                <div class="input">
                    <label>Nama Barang</label> <br>
                    <input type="text" name="nama" value="<?php echo $data['nama']; ?>" />
                </div>
                <div class="input">
                    <label>Kategori</label> <br>
                    <select name="kategori">
                        <option value="Komputer" <?php echo $data['kategori'] == 'Komputer' ? 'selected' : ''; ?>>Komputer</option>
                        <option value="Elektronik" <?php echo $data['kategori'] == 'Elektronik' ? 'selected' : ''; ?>>Elektronik</option>
                        <option value="Hand Phone" <?php echo $data['kategori'] == 'Hand Phone' ? 'selected' : ''; ?>>Hand Phone</option>
                    </select>
                </div>
                <div class="input">
                    <label>Harga Jual</label> <br>
                    <input type="text" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" />
                </div>
                <div class="input">
                    <label>Harga Beli</label> <br>
                    <input type="text" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" />
                </div>
                <div class="input">
                    <label>Stok</label> <br>
                    <input type="text" name="stok" value="<?php echo $data['stok']; ?>" />
                </div>
                <div class="input">
                    <label>File Gambar</label>
                    <input type="file" name="file_gambar" />
                    <br>
                </div>
                <div class="submit">
                    <input type="submit" name="submit" value="Update" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>
