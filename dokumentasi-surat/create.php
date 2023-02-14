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
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <script src="./assets/js/bootstrap.min"></script>
</head>
<body>

    <div class="container">
        <div class="bg-success shadow-lg rounded-bottom-2">
            <h4 class="p-4 text-light"><a href="index.php" class="text-decoration-none text-light">Dokumentasi Surat</a></h4>
        </div>

        <div class="mx-auto w-50 my-4 bg-light shadow-lg rounded-4">
            <form action="" method="post" enctype="multipart/form-data" class="p-5">
                <div class="mb-4 border-bottom">
                    <h4>Tambah Surat</h4>
                </div>
                <div class="mb-2">
                    <label for="tanggal_surat" class="form-label fw-semibold">Tanggal Surat:</label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="tanggal_entry" class="form-label fw-semibold">Tanggal Entry:</label>
                    <input type="date" name="tanggal_entry" id="tanggal_entry" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="jenis_surat" class="form-label fw-semibold">Jenis Surat:</label>
                    <input type="text" name="jenis_surat" id="jenis_surat" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="asal_surat" class="form-label fw-semibold">Asal Surat:</label>
                    <input type="text" name="asal_surat" id="asal_surat" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="keterangan" class="form-label fw-semibold">Keterangan:</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="tag" class="form-label fw-semibold">Tag:</label>
                    <input type="text" name="tag" id="tag" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label for="dokumen" class="form-label fw-semibold">Upload Surat:</label>
                    <input type="file" name="dokumen" id="dokumen" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success mt-3">Submit</button>
            </form>
        </div>
        
    </div>
    
</body>
</html>