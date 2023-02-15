<?php 
    require_once("../config/koneksi_db.php");
    if (isset($_POST["tanggal_surat"]) &&
        isset($_POST["tanggal_entry"]) &&
        isset($_POST["jenis_surat"]) &&
        isset($_POST["asal_surat"]) &&
        isset($_POST["keterangan"]) &&
        isset($_POST["tag"]) &&
        isset($_FILES["dokumen"])
    ) {
        $tanggal_surat = $_POST["tanggal_surat"];
        $tanggal_entry = $_POST["tanggal_entry"];
        $jenis_surat = $_POST["jenis_surat"];
        $asal_surat = $_POST["asal_surat"];
        $keterangan = $_POST["keterangan"];
        $tag = $_POST["tag"];


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

    
        // $dokumen = $_FILES["dokumen"];

        // $allowed_types = ['doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx'];
        
        // $ekstensi_dokumen = explode('.', $dokumen['name']);
        // $ekstensi_dokumen = strtolower(end($ekstensi_dokumen));    
        
        // if (!in_array($ekstensi_dokumen, $allowed_types)) {
        //     echo "TIPE FILE TIDAK DIIZINKAN";
        //     return false;
        // }
        
        // $max_size = 1 * 1024 * 1024;
        // if ($dokumen['size'] > $max_size) {
        //     echo "FILE TERLALU BESAR";
        //     return false;
        // }


        // $destination = '../files/'.$dokumen['name'];
        // if (!move_uploaded_file($dokumen['tmp_name'], $destination)) {
        //     echo "GAGAL MEMINDAHKAN FILE";
        //     return false;
        // }
        
        // move_uploaded_file($dokumen['tmp_name'], $destination);


        $query = "INSERT INTO surat VALUES ('', '$tanggal_surat', '$tanggal_entry', '$jenis_surat', '$asal_surat', '$keterangan', '$tag', '$nama_file_baru')";
        
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            echo json_encode(array('RESPONSE' => 'SUCCESS'));
        } else {
            echo "GAGAL";
        }

    }

?>