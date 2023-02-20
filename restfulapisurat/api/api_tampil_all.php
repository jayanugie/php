<?php 
    require_once('../config/koneksi_db.php');
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json; charset=utf8');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        
        $sql = 'SELECT * FROM surat';
        $query = mysqli_query($conn, $sql);
        $array_data = array();
        while($data = mysqli_fetch_assoc($query)) {
            $array_data[] = $data;
        }
        echo json_encode($array_data);

        mysqli_close($conn);
    }
?>