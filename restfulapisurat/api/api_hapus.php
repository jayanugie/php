<?php 
    require_once('../config/koneksi_db.php');
    header('Content-Type: application/json; charset=utf8');

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

        $id = $_GET['id'];
        $sql = "DELETE FROM surat WHERE id = '$id' ";

        $file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM surat WHERE id = '$id' "));
        unlink('../files/'.$file["dokumen"]);

        $query = mysqli_query($conn, $sql);
        
        if ($query) {
            $data = [
                'status' => 'SUCCESS',
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