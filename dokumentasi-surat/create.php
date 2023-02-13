<?php 

require 'functions.php';

if (isset($_POST["submit"])) {

    if(create($_POST) > 0) {
        echo "
            <script>
                alert('dokumen berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('dokumen gagal ditambahkan!');
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
    <title>Tambah Surat</title>
</head>
<body>
    <h1>Tambah Surat</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="tanggal_surat">Tanggal Surat:</label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" required>
            </li>
            <li>
                <label for="tanggal_entry">Tanggal Entry:</label>
                <input type="date" name="tanggal_entry" id="tanggal_entry" required>
            </li>
            <li>
                <label for="jenis_surat">Jenis Surat:</label>
                <input type="text" name="jenis_surat" id="jenis_surat" required>
            </li>
            <li>
                <label for="asal_surat">Asal Surat:</label>
                <input type="text" name="asal_surat" id="asal_surat" required>
            </li>
            <li>
                <label for="keterangan">Keterangan:</label>
                <input type="text" name="keterangan" id="keterangan" required>
            </li>
            <li>
                <label for="tag">Tag:</label>
                <input type="text" name="tag" id="tag" required>
            </li>
            <li>
                <label for="dokumen">Upload Surat:</label>
                <input type="file" name="dokumen" id="dokumen" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Surat</button>
            </li>
        </ul>
    </form>
    
</body>
</html>