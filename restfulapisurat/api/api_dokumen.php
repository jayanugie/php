<?php
    require_once('../config/koneksi_db.php');
    header("Access-Control-Allow-Origin: *");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM surat WHERE id = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $dokumen = $row['dokumen'];
            $file_path = '../files/'.$dokumen;

            if (file_exists($file_path)) {
                header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
                header('Content-Type: application/octet-stream');
                header('Content-Length: ' . filesize($file_path));
                readfile($file_path);
                exit;
            } else {
                echo "File not found.";
            }
        }

        $conn->close();
    }
?>