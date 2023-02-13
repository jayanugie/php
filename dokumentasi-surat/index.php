<?php 

require 'functions.php';

$dokumentasi = query("SELECT * FROM surat");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Surat</title>
</head>
<body>
    <h1>Dokumentasi Surat</h1>
    <a href="create.php">Tambah Surat</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Tanggal Surat</th>
            <th>Tanggal Entry</th>
            <th>Jenis Surat</th>
            <th>Asal Surat</th>
            <th>Keterangan</th>
            <th>Tag</th>
            <th>Dokumen</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1 ?>
        <?php foreach($dokumentasi as $row) : ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $row["tanggal_surat"]; ?></td>
            <td><?= $row["tanggal_entry"]; ?></td>
            <td><?= $row["jenis_surat"]; ?></td>
            <td><?= $row["asal_surat"]; ?></td>
            <td><?= $row["keterangan"]; ?></td>
            <td><?= $row["tag"]; ?></td>
            <td><?= $row["dokumen"]; ?></td>
            <td>
                <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')">hapus</a> |
                <a href="update.php?id=<?= $row["id"]; ?>">ubah</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>

    </table>    
</body>
</html>