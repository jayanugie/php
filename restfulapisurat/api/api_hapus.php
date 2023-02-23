<?php 
    require_once('../config/koneksi_db.php');
    header('Content-Type: application/json; charset=utf8');
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Content-Type');

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

        $id = $_GET['id'];
        $sql = "DELETE FROM surat WHERE id = '$id' ";

        $file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM surat WHERE id = '$id' "));


        function deleteDirectory($dir) {
            if (!file_exists($dir)) {
                return true;
            }
            if (!is_dir($dir)) {
                return unlink($dir);
            }
            foreach (scandir($dir) as $item) {
                if ($item == '.' || $item == '..') {
                    continue;
                }
                if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                    return false;
                }
            }
            return rmdir($dir);
        }

        $dir = '../files/'.$file["id"]; 
        deleteDirectory($dir);
        
        $query = mysqli_query($conn, $sql);

        mysqli_close($conn);
        
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