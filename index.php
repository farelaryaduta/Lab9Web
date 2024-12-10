<?php
include("koneksi.php");

$sql = "SELECT * FROM data_barang";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            display: flex;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th,
        tr,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr {
            background-color: #ffff;
        }

        .kaciw {
            max-width: 80px;
            height: auto;
        }
    </style>
    <title>Data Barang</title>
</head>

<body>
    <?php
    require('header.php')
        ?>
    <div class="container">
        <h1>Data Barang</h1>
        <a href="tambah.php">Tambah Barang</a>
        <div class="main">
            <table>
                <tr>
                    <th>Gambar</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if ($result): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>
                                <img src="gambar/<?= $row['gambar']; ?>" alt=" <?= $row['nama']; ?>" class="kaciw">
                            </td>
                            <td><?= $row['id_barang']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['kategori']; ?></td>
                            <td><?= $row['harga_jual']; ?></td>
                            <td><?= $row['harga_beli']; ?></td>
                            <td><?= $row['stok']; ?></td>
                            <td><a href="ubah.php?id_barang=<?php echo $row['id_barang']; ?>">Ubah</a>
                                <a href="hapus.php?id_barang=<?php echo $row['id_barang']; ?>"
                                    onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</a>
                            </td>

                        </tr>
                    <?php endwhile; else: ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <?php
    require('footer.php');
    ?>

</body>

</html>