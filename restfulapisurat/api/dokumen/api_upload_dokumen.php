<?php
    require_once('../../config/koneksi_db.php');
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; charset=utf8');

    //membuat response array
    $response = array();

    //mengecek apakah method yang digunakan adalah POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        //mengecek apakah parameter id_surat sudah terisi
        if (isset($_POST['id_surat'])) {
            
            //mendapatkan id surat dari parameter
            $id_surat = $_POST['id_surat'];
            
            //mendapatkan path folder untuk menyimpan file
            $path = '../../files/';
            
            //mendapatkan jumlah file yang diupload
            $total_files = count($_FILES['files']['name']);
            
            //membuat array untuk menyimpan pesan error
            $errors = array();
            
            //mengulang untuk setiap file yang diupload
            for ($i = 0; $i < $total_files; $i++) {
                
                //mendapatkan nama, tipe, dan ukuran file
                $nama_file = $_FILES['files']['name'][$i];
                $tmp_file = $_FILES['files']['tmp_name'][$i];
                $file_size = $_FILES['files']['size'][$i];
                $file_type = $_FILES['files']['type'][$i];
                
                //mengecek apakah ekstensi file diizinkan
                $allowed_extensions = array('pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx');
                $file_ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
                if (!in_array($file_ext, $allowed_extensions)) {
                    $errors[] = "File $nama_file memiliki ekstensi yang tidak diizinkan.";
                }
                
                //mengecek ukuran file
                if ($file_size > 2000000) { //2MB
                    $errors[] = "File $nama_file melebihi ukuran maksimal 2MB.";
                }
                
                //jika tidak ada error
                if (empty($errors)) {
                    
                    //menyimpan file ke folder
                    $target_file = $path . $id_surat . '/' . $nama_file;
                    if (!is_dir($path . $id_surat)) {
                        mkdir($path . $id_surat);
                    }
                    move_uploaded_file($tmp_file, $target_file);
                    
                    //menyimpan informasi file ke database
                    $sql = "INSERT INTO dokumen (id_surat, nama_file, tipe_file, ukuran_file, path_file) VALUES ('$id_surat', '$nama_file', '$file_type', '$file_size', '$target_file')";
                    if (mysqli_query($conn, $sql)) {
                        $response['success'][] = "File $nama_file berhasil diupload.";
                    } else {
                        $response['error'] = "Terjadi kesalahan saat menyimpan informasi file.";
                    }
                } else {
                    $response['error'] = $errors;
                }
            }
        } else {
            $response['error'] = "Parameter id_surat tidak ditemukan.";
        }
    } else {
        $response['error'] = "Metode HTTP yang digunakan harus POST.";
    }

    //menampilkan response dalam format JSON
    echo json_encode($response);

    //menutup koneksi database
    mysqli_close($conn);
        
?>
