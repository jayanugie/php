<?php 

require 'functions.php';

$id = $_GET["id"];

$dok = query("SELECT * FROM surat WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    if(update($_POST) > 0) {
        echo "
            <script>
                alert('Surat berhasil diubah.');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Surat gagal diubah.');
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
    <title>Edit Surat</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <script src="./assets/js/bootstrap.min"></script>
</head>
<body>
    <div class="container">
        <div class="bg-success shadow-lg rounded-bottom-2">
            <h4 class="p-4 text-light"><a href="index.php" class="text-decoration-none text-light">Dokumentasi Surat</a></h4>
        </div>
    </div>

    <div class="mx-auto w-50 my-4 bg-light shadow-lg rounded-4">        
        <form action="" method="post" enctype="multipart/form-data" class="p-5">
            
            <input type="hidden" name="id" value="<?= $dok["id"] ?>">
            <input type="hidden" name="dokumen_lama" value="<?= $dok["dokumen"] ?>">
            
            <div class="mb-4 border-bottom">
                <h4>Edit Surat</h4>
            </div>
            <div class="mb-2">
                <label for="tanggal_surat" class="form-label fw-semibold">Tanggal Surat:</label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" required value="<?= $dok["tanggal_surat"] ?>" class="form-control">
            </div>
            <div class="mb-2">
                <label for="tanggal_entry" class="form-label fw-semibold">Tanggal Entry:</label>
                <input type="date" name="tanggal_entry" id="tanggal_entry" required value="<?= $dok["tanggal_entry"] ?>" class="form-control">
            </div>
            <div class="mb-2">
                <label for="jenis_surat" class="form-label fw-semibold">Jenis Surat:</label>
                <input type="text" name="jenis_surat" id="jenis_surat" required value="<?= $dok["jenis_surat"] ?>" class="form-control">
            </div>
            <div class="mb-2">
                <label for="asal_surat" class="form-label fw-semibold">Asal Surat:</label>
                <input type="text" name="asal_surat" id="asal_surat" required value="<?= $dok["asal_surat"] ?>" class="form-control">
            </div>
            <div class="mb-2">
                <label for="keterangan" class="form-label fw-semibold">Keterangan:</label>
                <input type="text" name="keterangan" id="keterangan" required value="<?= $dok["keterangan"] ?>" class="form-control">
            </div>
            <div class="mb-2">
                <label for="tag" class="form-label fw-semibold">Tag:</label>
                <input type="text" name="tag" id="tag" required value="<?= $dok["tag"] ?>" class="form-control">
            </div>
            <div class="mb-2">
                <label for="dokumen" class="form-label fw-semibold">Edit Surat:</label>
                <p><i><?= $dok['dokumen'] ?></i></p>
                <input type="file" name="dokumen" id="dokumen" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-success mt-3">Edit Surat</button>
        </form>
    </div>
        
</body>
</html>