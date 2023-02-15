<?php 

function upload() {
    $nama_file = $_FILES['dokumen']['name'];
    $ukuran_file = $_FILES['dokumen']['size'];
    $error = $_FILES['dokumen']['error'];
    $tmp_name = $_FILES['dokumen']['tmp_name'];

    if ($error === 4) {
        echo "
            <script>
                alert('Pilih dokumen terlebih dahulu.');
            </script>
        ";
        return false;
    }

    $ekstensi_dokumen_valid = ['doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx'];
    $ekstensi_dokumen = explode('.', $nama_file);
    $ekstensi_dokumen = strtolower(end($ekstensi_dokumen));

    if (!in_array($ekstensi_dokumen, $ekstensi_dokumen_valid)) {
        echo "
            <script>
                alert('Yang Anda upload bukan dokumen.');
            </script>
        ";
        return false;
    }

    if ($ukuran_file > 1500000) {
        echo "
            <script>
                alert('Ukuran dokumen terlalu besar. Maksimal ukuran 1.5MB. ');
            </script>
        ";
        return false;
    }

    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_dokumen;

    move_uploaded_file($tmp_name, '../files/'.$nama_file_baru);

    return $nama_file_baru;
}

?>