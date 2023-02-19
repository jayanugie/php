<?php 
    require_once('../config/koneksi_db.php');
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; charset=utf8');


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id = $_POST['id'];
        $tanggal_surat = $_POST['tanggal_surat'];
        $tanggal_entry = $_POST['tanggal_entry'];
        $jenis_surat = $_POST['jenis_surat'];
        $asal_surat = $_POST['asal_surat'];
        $keterangan = $_POST['keterangan'];
        $tag = $_POST['tag'];

        // Get file name of old file
        $sql_select = "SELECT dokumen FROM surat WHERE id = $id";
        $result = $conn->query($sql_select);
        $row = $result->fetch_assoc();
        $old_file_name = $row['dokumen'];

        if($_FILES['dokumen']['error'] === 4) {
            $dokumen = $old_file_name;
        } else {

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
            $dokumen = $nama_file_baru;

            unlink('../files/'.$old_file_name);
    
            move_uploaded_file($tmp_name, '../files/'.$dokumen);

        }

        $sql = "UPDATE surat SET 
                    tanggal_surat = '$tanggal_surat',
                    tanggal_entry = '$tanggal_entry',
                    jenis_surat = '$jenis_surat',
                    asal_surat = '$asal_surat',
                    keterangan = '$keterangan',
                    tag = '$tag',
                    dokumen = '$dokumen'
                WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            $response = array(
                'status' => true,
                'message' => 'Data berhasil diupdate.'
            );
        } else {
            $response = array(
                'status' => false,
                'message' => 'Error: ' . $sql . '<br>' . $conn->error
            );
        }
    } else {
        $response = array(
            'status' => false,
            'message' => 'Invalid Request'
        );
    }

    echo json_encode($response);

?>