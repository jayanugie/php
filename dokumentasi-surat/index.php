<?php 

require 'functions.php';

$dokumentasi = query("SELECT * FROM surat");

if (isset($_POST["search"])) {
    $dokumentasi = search($_POST["keyword"]);
}

$file_url = "http://127.0.0.1/phpdasar/dokumentasi-surat/berkas/";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Surat</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <script src="./assets/js/bootstrap.min"></script>
</head>
<body>
    <div class="container">
        <div class="row bg-success shadow-lg rounded-bottom-2">
            <div class="col-md-6 p-4 text-light">
                <h4>Dokumentasi Surat</h4>
            </div>
            <div class="col-md-6 p-4">
                <div class="d-flex gap-4 justify-content-end">
                    <a href="create.php" class="text-light text-decoration-none p-2"><img src="./assets/img/plus.png" alt="plus"></a>
                    <form action="" method="post" class="d-flex gap-2">
                        <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian..." class="form-control">
                        <button type="submit" name="search" class="btn btn-light btn-sm">Cari</button>
                    </form>
                </div>
            </div>
        </div>


        <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered table-hover mt-4 shadow-lg">
            <thead>
                <tr class="bg-success text-center text-light">
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
            </thead>
    
            <?php $i = 1 ?>
            <?php foreach($dokumentasi as $row) : ?>
            <tbody>
                <tr class="text-center">
                    <td><?= $i ?></td>
                    <td><?= date('d-M-Y', strtotime($row["tanggal_surat"])); ?></td>
                    <td><?= date('d-M-Y', strtotime($row["tanggal_entry"])); ?></td>
                    <td><?= $row["jenis_surat"]; ?></td>
                    <td><?= $row["asal_surat"]; ?></td>
                    <td><?= $row["keterangan"]; ?></td>
                    <td><?= $row["tag"]; ?></td>
                    <td>
                        <div class="d-flex justify-content-evenly">
                            <a href="./berkas/<?= $row["dokumen"] ?> "><img src="./assets/img/download.png" alt="download" width="25"></a>
                            <a href="https://docs.google.com/viewer?url=<?= $file_url.$row['dokumen'] ?>" target="_blank"><img src="./assets/img/preview.png" alt="preview" width="25"></a>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-evenly">
                            <a href="update.php?id=<?= $row["id"]; ?>"><img src="./assets/img/edit.png" alt="edit" width="25"></a>
                            <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')"><img src="./assets/img/trash.png" alt="delete" width="25"></a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <?php $i++ ?>
            <?php endforeach; ?>
    
        </table>    
    </div>
</body>
</html>