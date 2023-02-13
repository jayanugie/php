<?php 

require 'functions.php';

$id = $_GET["id"];

$dok = query("SELECT * FROM surat WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    if(update($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Surat</title>
</head>
<body>
    <h1>Ubah Surat</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $dok["id"] ?>">
        <input type="hidden" name="dokumen_lama" value="<?= $dok["dokumen"] ?>">
        <ul>
            <li>
                <label for="tanggal_surat">Tanggal Surat:</label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" required value="<?= $dok["tanggal_surat"] ?>">
            </li>
            <li>
                <label for="tanggal_entry">Tanggal Entry:</label>
                <input type="date" name="tanggal_entry" id="tanggal_entry" required value="<?= $dok["tanggal_entry"] ?>">
            </li>
            <li>
                <label for="jenis_surat">Jenis Surat:</label>
                <input type="text" name="jenis_surat" id="jenis_surat" required value="<?= $dok["jenis_surat"] ?>">
            </li>
            <li>
                <label for="asal_surat">Asal Surat:</label>
                <input type="text" name="asal_surat" id="asal_surat" required value="<?= $dok["asal_surat"] ?>">
            </li>
            <li>
                <label for="keterangan">Keterangan:</label>
                <input type="text" name="keterangan" id="keterangan" required value="<?= $dok["keterangan"] ?>">
            </li>
            <li>
                <label for="tag">Tag:</label>
                <input type="text" name="tag" id="tag" required value="<?= $dok["tag"] ?>">
            </li>
            <li>
                <label for="dokumen">Upload Surat:</label>
                <p><?= $dok['dokumen'] ?></p>
                <input type="file" name="dokumen" id="dokumen">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Surat</button>
            </li>
        </ul>
    </form>


    <script>

    </script>
    
</body>
</html>