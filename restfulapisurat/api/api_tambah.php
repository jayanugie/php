<?php 
    require_once('../config/koneksi_db.php');
    header('Content-Type: application/json; charset=utf8');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $tanggal_surat = $_POST["tanggal_surat"];
        $tanggal_entry = $_POST["tanggal_entry"];
        $jenis_surat = $_POST["jenis_surat"];
        $asal_surat = $_POST["asal_surat"];
        $keterangan = $_POST["keterangan"];
        $tag = $_POST["tag"];

            // DOKUMEN
            $nama_file = $_FILES['dokumen']['name'];
            $ukuran_file = $_FILES['dokumen']['size'];
            $error = $_FILES['dokumen']['error'];
            $tmp_name = $_FILES['dokumen']['tmp_name'];
        
            if ($error === 4) {
                echo "PILIH DOKUMEN TERLEBIH DULU";
                return false;
            }
        
            $ekstensi_dokumen_valid = ['doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx'];
            $ekstensi_dokumen = explode('.', $nama_file);
            $ekstensi_dokumen = strtolower(end($ekstensi_dokumen));
        
            if (!in_array($ekstensi_dokumen, $ekstensi_dokumen_valid)) {
                echo "YANG ANDA UPLOAD BUKAN DOKUMEN";
                return false;
            }
        
            if ($ukuran_file > 1500000) {
                echo "UKURAN DOKUMEN TERLALU BESAR, MAKSIMAL 1.5MB";
                return false;
            }
        
            $nama_file_baru = uniqid();
            $nama_file_baru .= '.';
            $nama_file_baru .= $ekstensi_dokumen;
        
            move_uploaded_file($tmp_name, '../files/'.$nama_file_baru);

        $sql = "INSERT INTO surat VALUES ('', '$tanggal_surat', '$tanggal_entry', '$jenis_surat', '$asal_surat', '$keterangan', '$tag', '$nama_file_baru')";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            $data = [
                'status' => 'SUCCESS'
            ];
            echo json_encode([$data]);
        } else {
            $data = [
                'status' => 'FAILED'
            ];
            echo json_encode([$data]);
        }
    }

?>